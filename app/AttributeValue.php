<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    public function values ()
    {
        return $this->hasOne('App\Attribute', 'id', 'attribute_id');
    }
}
