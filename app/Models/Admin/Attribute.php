<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /**
     * This Model relationship with Attribute Model.
     *
     * @function belongsTo
     */
    public function product()
    {
        return $this->belongsToMany('App\Models\Admin\Products', 'attribute_products')->withTimestamps();
    }

    /**
     * This Model relationship with Variation Model.
     *
     * @function belongsTo
     */
    public function variants()
    {
        return $this->hasMany(Variation::class);
    }
}
