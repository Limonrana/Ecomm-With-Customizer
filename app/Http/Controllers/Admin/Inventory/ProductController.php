<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Admin\Attribute;
use App\Models\Admin\AttributeProducts;
use App\Models\Admin\Category;
use App\Models\Admin\Photo;
use App\Models\Admin\PhotoVariations;
use App\Models\Admin\Product;
use App\Models\Admin\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(16);
        $count = Product::all()->count();
        return view('admin.pages.inventory.product.product-grid', compact('products', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $attribute  = Attribute::all();
        return view('admin.pages.inventory.product.new-product', compact('category','attribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->storeData($request);

        if ($data) {
            $notification = array(
                'alert' => 'Product successfully created.',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        $attribute  = Attribute::all();
        return view('admin.pages.inventory.product.product-edit', compact('product', 'category', 'attribute'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $request, $id)
    {
        $data = $this->storeData($request, $id);

        if ($data) {
            $notification = array(
                'alert' => 'Product successfully updated.',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributeGet = AttributeProducts::where('product_id', $id)->get();
        if ($attributeGet) {
            foreach ($attributeGet as $val) {
                $attribute = AttributeProducts::find($val->id);
                $attribute->delete();
            }
        }
        $product = Product::find($id);
        if ($product->preview_image_id != null) {
            $photo = Photo::find($product->preview_image_id);
            unlink($photo->small);
            unlink($photo->medium);
            unlink($photo->large);
            $photo->delete();
        }
        $product->delete();
        return redirect()->route('product.index');
    }

    /**
     * Remove the product image from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $product = Product::where('preview_image_id', $id)->first();
        if ($product->preview_image_id == $id) {
            $product->preview_image_id = null;
        }
        $product->save();

        $photo = Photo::find($id);
        unlink($photo->small);
        unlink($photo->medium);
        unlink($photo->large);
        $photo->delete();
    }

    /**
     * Store a newly created resource in storage Or Update with methods.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeData($request, $id = null)
    {
        $validatedData = $request->validate([
            'title'                     => 'required|max:55|unique:products,title,'.$id,
            'category_id'               => 'required',
            'distID'                    => 'required',
            'solution3DID'              => 'required',
            'solution3DName'            => 'required',
            'script_code'               => 'required',
            'projectName'               => 'required',
        ]);
        if ($id == null) {
            $product                    = new Product();
        } else {
            $product                    = Product::find($id);
        }
        $product->title                 = $request->title;
        $product->subtitle              = $request->subtitle;
        $product->price                 = $request->price;
        $product->category_id           = $request->category_id;
        $product->description           = $request->description;
        $product->distID                = $request->distID;
        $product->solution3DID          = $request->solution3DID;
        $product->solution3DName        = $request->solution3DName;
        $product->script_code           = $request->script_code;
        $product->projectName           = $request->projectName;
        $product->seo_title             = $request->seo_title;
        $product->seo_slug              = $request->seo_slug;
        $product->meta_keywords         = $request->meta_keywords;
        $product->meta_description      = $request->meta_description;
        $product->status                = $request->status;
        $product->slug                  = Str::of($request->title)->slug('-');

        //Image Upload And Delete Code
        if ($request->image) {
            $getImage = $product->featured_image ?? 1;
            $getId = $this->uploadImage($request->image, $getImage);
            $product->preview_image_id  = $getId;
        }
        $product->save();

        //Product Attribute ID Upload
        $product->attribute()->sync($request->attribute_id);

        return true;
    }

    /**
     * Photo Upload Methods.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadImage($image, $id=null)
    {
        if ($id != null) {
            if ($id != 1) {
                $photo = Photo::find($id);
                unlink($photo->small);
                unlink($photo->medium);
                unlink($photo->large);
                $photo->delete();
            }
        }
        $smallImage     = 'small_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $mediumImage    = 'medium_'. uniqid() . '.' . $image->getClientOriginalExtension();
        $largeImage     = 'large_'. uniqid() .'.' . $image->getClientOriginalExtension();
        // resizing an uploaded file
        Image::make($image)->resize(350, 300)->save(public_path('uploads/small/' . $smallImage));
        Image::make($image)->resize(270, 360)->save(public_path('uploads/medium/' . $mediumImage));
        Image::make($image)->save(public_path('uploads/large/' . $largeImage));
        $photo                  = new Photo();
        $photo->small           = 'uploads/small/' . $smallImage;
        $photo->medium          = 'uploads/medium/' . $mediumImage;
        $photo->large           = 'uploads/large/' . $largeImage;
        $photo->save();
        $img_id = $photo->id;
        return $img_id;
    }
}
