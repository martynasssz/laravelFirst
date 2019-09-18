<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeSetRelationship extends Model
{
    public function attributes(){
        return $this->hasOne('App\Attribute','id', 'attribute_id');
    }
}
