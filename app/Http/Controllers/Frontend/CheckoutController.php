<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\BillingDetail;
use App\Models\Admin\Country;
use App\Models\Admin\Order;
use App\Models\Admin\OrderDetail;
use App\Models\Admin\ShippingDetail;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        $country = Country::all();
        if (count($cart) < 1) {
            $notification = array(
                'alert' => 'OOPS! Your cart is empty, at first add a product to cart.',
                'alert-type' => 'warning'
            );
            return redirect()->route('front.collection')->with($notification);
        }
        return view('pages.checkout', compact('cart', 'country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'                     => 'required',
            'email'                    => 'required',
            'phone'                    => 'required',
            'address_1'                => 'required',
            'country'                  => 'required',
            'city'                     => 'required',
            'state'                    => 'required',
            'zip'                      => 'required',
        ]);

        $total = Cart::Subtotal() + 20;
        $storeOrder = $this->orderStore($request, $total);

        if ($storeOrder) {
            $details = $this->detailsStore($storeOrder->id);
            $shipping = $this->customerDataStore($request, $storeOrder->id, 'shipping');
            $billing = $this->customerDataStore($request, $storeOrder->id,'billing');

            if ($request->payment_method == 'card') {
                $stripe = $this->stripePayment($request, $total, $storeOrder->order_number);
                if ($stripe) {
                    $updateOrder = $this->update($storeOrder->id, $stripe);
                } else {
                    Cart::destroy();
                    $notification = array(
                        'alert' => 'Order successfully created without payment!',
                        'alert-type' => 'warning'
                    );
                    return redirect()->route('front.checkout.confirm')->with($notification);
                }
            } else {
                $updateOrder = $this->update($storeOrder->id);
            }
        } else {
            $notification = array(
                'alert' => 'OOPS! Something Wrong, Please check everything.',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        Cart::destroy();
        $notification = array(
            'alert' => 'Order successfully created.',
            'alert-type' => 'success'
        );
        return redirect()->route('front.checkout.confirm', $storeOrder->id)->with($notification);

//        session()->put('order', [
//            'user_id'           => Auth::user()->id,
//            'shipping'          => 20,
//            'total'             => $total,
//            'name'              => $request->name,
//            'email'             => $request->email,
//            'phone'             => $request->phone,
//            'company'           => $request->company,
//            'address_1'         => $request->address_1,
//            'address_2'         => $request->address_2,
//            'city'              => $request->city,
//            'state'             => $request->state,
//            'zip'               => $request->zip,
//            'country'           => $request->country,
//        ]);

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
        $billing_country = Country::where('id', $order->billing->country)->first();
        $shipping_country = Country::where('id', $order->shipping->country)->first();
        return view('pages.order-confirm', compact('order', 'billing_country', 'shipping_country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function orderStore($request, $total)
    {
        $order      = Order::orderBy('id','desc')->first();
        $id = $order ? $order->id : 0;
        $order_number = '#SO-'.str_pad($id + 1, 6, "0", STR_PAD_LEFT);

        $order                      = new Order();
        $order->order_number        = $order_number;
        $order->user_id             = Auth::user()->id;
        $order->payment_type        = $request->payment_method;
        $order->shipping_cost       = 20;
        $order->shipping_method     = "DHL";
        $order->total               = $total;
        $order->date                = date("d-m-Y");
        $order->month               = date("m");
        $order->year                = date("Y");
        $order->refund              = 0;
        $order->is_pay              = 0;
        $order->is_fulfilled        = 0;
        $order->status              = 0;
        $order->save();

        return $order;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function detailsStore($order_id)
    {
        $cart = Cart::content();
        foreach ($cart as $value) {
            $order                      = new OrderDetail();
            $order->order_id            = $order_id;
            $order->title               = $value->name;
            $order->category_id         = $value->options->category_id;
            $order->length              = $value->options->length;
            $order->width               = $value->options->width;
            $order->height              = $value->options->height;
            $order->fabric_details      = null;
            $order->quantity            = $value->qty;
            $order->price               = $value->price;
            $order->total_price         = $value->qty * $value->price;
            $order->image               = $value->options->image;
            $order->save();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function update($id, $payment = null)
    {
        $order                      = Order::find($id);
        $order->payment_id          = $payment ? $payment->payment_id : null;
        $order->transaction_id      = $payment ? $payment->balance_transaction : null;
        $order->status              = 1;
        $order->is_pay              = 1;
        $order->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function customerDataStore($request, $id, $tableName)
    {
        $data                           = $tableName == 'shipping' ? new ShippingDetail() : new BillingDetail();
        $data->order_id                 = $id;
        $data->name                     = $request->name;
        $data->email                    = $request->email;
        $data->phone                    = $request->phone;
        $data->company                  = $request->company;
        $data->address_1                = $request->address_1;
        $data->address_2                = $request->address_2;
        $data->city                     = $request->city;
        $data->state                    = $request->state;
        $data->zip                      = $request->zip;
        $data->country                  = $request->country;
        $data->save();
        return $data;
    }

    /**
     * Process a newly payment for stripe.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function stripePayment($request, $total, $order_id)
    {
        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));
        $payment = $stripe->charges->create([
            "amount" => $total * 100,
            "currency" => "usd",
            'source' => 'tok_amex',
            "description" => "Product payment from Ecomm",
            "metadata"  => ['order_number' => $order_id],
        ]);
        return $payment;
    }
}
