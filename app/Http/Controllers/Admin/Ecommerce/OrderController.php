<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Admin\BillingDetail;
use App\Models\Admin\Country;
use App\Models\Admin\Order;
use App\Models\Admin\OrderDetail;
use App\Models\Admin\ShippingDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('refund', 0)->latest()->get();
        return view('admin.pages.orders.all-orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('admin.pages.orders.single-order', compact('order'));
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
     * Hold the order from the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hold($id)
    {
        $order          = Order::find($id);
        if ($order->status == 3) {
            $order->status  = 1;
        } else {
            $order->status  = 3;
        }
        $order->save();
        $notification = array(
            'alert' => 'Order successfully hold.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Refund the order from the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function refund($id)
    {
        $order          = Order::find($id);
        $order->refund  = 1;
        $order->save();
        $notification = array(
            'alert' => 'Refund successfully done.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
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
        $order = Order::find($id);
        $orderDetails = OrderDetail::where('order_id', $order->id)->get();
        if ($orderDetails) {
            foreach ($orderDetails as $val) {
                $orderProduct = OrderDetail::find($val->id);
                if ($orderProduct->image != null) {
                    unlink('uploads/cart/'.$orderProduct->image);
                }
                $orderProduct->delete();
            }
        }
        $shipping = ShippingDetail::where('order_id', $order->id)->first();
        $shipping->delete();
        $billing = BillingDetail::where('order_id', $order->id)->first();
        $billing->delete();
        $order->delete();
        $notification = array(
            'alert' => 'Order successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->route('orders.index.all')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrder($id)
    {
        $order = Order::find($id);
        $billing_country = Country::where('id', $order->billing->country)->first();
        $shipping_country = Country::where('id', $order->shipping->country)->first();
        return view('pages.order-confirm', compact('order', 'billing_country', 'shipping_country'));
    }
}
