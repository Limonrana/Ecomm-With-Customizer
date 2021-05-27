<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        return view('pages.cart', compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->image) {
            $getImage       = $request->image;
            $first_position = strpos($getImage, ';');
            $second_position = substr($getImage, 0, $first_position);
            $ext = explode('/', $second_position)[1];
            $photo_name = Str::random(20).time().'.'.$ext;

            $photo_name     = 'cart_' . uniqid() . '.'.$ext;
            // resizing an uploaded file
            Image::make($getImage)->resize(750, 550)->save(public_path('uploads/cart/' . $photo_name));
        }

        $product   = Product::where('id', $request->id)->first();
        $data = array();
        $data['id'] = $product->id;
        $data['name'] = $product->title;
        $data['qty'] = 1;
        $data['weight'] = 1;
        $data['price'] = $request->price;
        $data['options']['image'] = $photo_name ? $photo_name : '';
        $data['options']['length'] = $request->getLength ? $request->getLength : '';
        $data['options']['width'] = $request->getWidth ? $request->getWidth : '';
        $data['options']['height'] = $request->getHeight ? $request->getHeight : '';
        $data['options']['category_id'] = $request->category_id ? $request->category_id : '';
        Cart::add($data);
        return response()->json('200');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::get($id);
        if ($cart->options->image != '') {
            unlink('uploads/cart/'.$cart->options->image);
        }
        Cart::remove($id);
        $notification['messege'] = 'Successfully deleted your Cart';
        $notification['alert-type'] = 'success';

        return back()->with($notification);
    }
}
