<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * This Model relationship with Address Model.
     *
     * @function belongsTo
     */
    public function getCountry()
    {
        return $this->belongsTo('App\Models\Admin\Country', 'country');
    }
}
