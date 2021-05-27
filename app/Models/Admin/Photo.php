<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * This Model relationship with Variation Model.
     *
     * @function belongsTo
     */
    public function variations()
    {
        return $this->belongsToMany('App\Models\Admin\Variation', 'photo_variations')->withTimestamps();
    }
}
