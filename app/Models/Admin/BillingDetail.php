<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class BillingDetail extends Model
{
    /**
     * This Model relationship with Country Model.
     *
     * @function belongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Models\Admin\Country', 'country');
    }
}
