<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeSet extends Model
{
    public function relations()
    {
        return $this->hasMany('App\AttributeSetRelationship','attribute_set_id', 'id');
    }

}
