<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * This Model relationship with Shipping Model.
     *
     * @function belongsTo
     */
    public function shipping()
    {
        return $this->hasOne('App\Models\Admin\ShippingDetail', 'order_id');
    }

    /**
     * This Model relationship with Shipping Model.
     *
     * @function belongsTo
     */
    public function billing()
    {
        return $this->hasOne('App\Models\Admin\BillingDetail', 'order_id');
    }

    /**
     * This Model relationship with Shipping Model.
     *
     * @function belongsTo
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * This Model relationship with User Model.
     *
     * @function belongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
