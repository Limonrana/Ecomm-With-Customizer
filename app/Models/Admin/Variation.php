<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    /**
     * This Model relationship with Photos Model.
     *
     * @function belongsTo
     */
    public function fabPhoto()
    {
        return $this->belongsTo('App\Models\Admin\Photo', 'material_image_id');
    }

    /**
     * This Model relationship with Photos Model.
     *
     * @function belongsTo
     */
    public function carePhoto()
    {
        return $this->belongsTo('App\Models\Admin\Photo', 'care_image_id');
    }

    /**
     * This Model relationship with Photos Model.
     *
     * @function belongsTo
     */
    public function attributes()
    {
        return $this->belongsTo('App\Models\Admin\Attribute', 'attribute_id');
    }
}
