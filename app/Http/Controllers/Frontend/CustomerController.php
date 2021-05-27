<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Address;
use App\Models\Admin\Country;
use App\Models\Admin\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $refund = Order::where('user_id', Auth::user()->id)->where('refund', 1)->where('refund', 2)->get();
        $customer = User::with('address')->find(Auth::user()->id);
        $country   = Country::all();
        return view('customer.dashboard', compact('orders', 'customer', 'country', 'refund'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('orderDetails.getCategory')->find($id);
        return response()->json($order);
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
        $validatedData = $request->validate([
            'phone'                    => 'required',
            'address_1'                => 'required',
            'country'                  => 'required',
            'city'                     => 'required',
            'state'                    => 'required',
            'zip'                      => 'required'
        ]);

        $address                       = Address::find($id);
        $address->phone                = $request->phone;
        $address->company              = $request->company;
        $address->address_1            = $request->address_1;
        $address->address_2            = $request->address_2;
        $address->country              = $request->country;
        $address->city                 = $request->city;
        $address->state                = $request->state;
        $address->zip                  = $request->zip;
        $address->save();
        $notification = array(
            'alert' => 'Address successfully updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Update password the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function passwordUpdate(Request $request)
    {
        $password = Auth::user()->password;
        $oldpass  = $request->oldpass;
        $confirmPass = $request->password_confirmation;
        $newPassword = $request->password;

        if (Hash::check($oldpass, $password)) {
            if ($newPassword === $confirmPass) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return response()->json('done');
            } else {
                return response()->json('new pass not match');
            }
        } else {
            return response()->json('old pass not match');
        }
    }

    /**
     * Update password the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function customerUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'                      => 'required',
            'email'                     => 'required|unique:users,email,'.$id,
        ]);
        $user                           = User::find($id);
        $user->name                     = $request->name;
        $user->email                    = $request->email;
        $user->save();
        $notification = array(
            'alert' => 'User successfully updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
