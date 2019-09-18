<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function type () {
        return $this->hasOne('App\AttributeType','id','type_id');
    }
}
