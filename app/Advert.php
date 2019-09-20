<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    public function category(){
        return $this->hasOne('App\Category','id','category_id');
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query) //tam, kad advert kontroleryje nereikėtu rasyti where('active',1) index metode;
    {
        return $query->where('active',1);
    }

    public function attributeSet()
    {
        return $this->hasOne('App\AttributeSet', 'id','attribute_set_id');
    }

    public function attributes()
    {
        return $this->hasMany('App\AttributeValue','advert_id', 'id');
    }
}
