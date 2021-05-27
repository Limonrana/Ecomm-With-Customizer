<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    /**
     * This Model relationship with Category Model.
     *
     * @function belongsTo
     */
    public function getCategory()
    {
        return $this->belongsTo('App\Models\Admin\Category', 'category_id');
    }
}
