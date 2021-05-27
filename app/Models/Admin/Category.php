<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * This Model relationship with Photo Model.
     *
     * @function belongsTo
     */
    public function photo()
    {
        return $this->belongsTo('App\Models\Admin\Photo', 'image_id');
    }
}
