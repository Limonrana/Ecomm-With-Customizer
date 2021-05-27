<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * This Model relationship with Category Model.
     *
     * @function belongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Category', 'category_id');
    }

    /**
     * This Model relationship with Unit Model.
     *
     * @function belongsTo
     */
//    public function unit()
//    {
//        return $this->belongsTo('App\Models\Admin\Unit', 'unit_id');
//    }

    /**
     * This Model relationship with Attribute Model.
     *
     * @function belongsTo
     */
    public function attribute()
    {
        return $this->belongsToMany('App\Models\Admin\Attribute', 'attribute_products')->withTimestamps();
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

    /**
     * This Model relationship with Photo Model.
     *
     * @function belongsTo
     */
    public function photo()
    {
        return $this->belongsTo('App\Models\Admin\Photo', 'preview_image_id');
    }
}
