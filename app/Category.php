<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function getCategoriesBranchIds($parentId)
    {
        $categoriesBranchIds = array();
        $category = Category::find($parentId);
        $categoriesBranchIds[] = $category->id;
        foreach ($category->subCategories as $subCategory) {
            $categoriesBranchIds[] = $subCategory->id;
            foreach ($subCategory->subCategories as $subSubCategory) {
                $categoriesBranchIds[] = $subSubCategory->id;
            }
        }
        return $categoriesBranchIds;
    }

    public function adverts()
    {
        return $this->hasMany('App\Advert', 'category_id', 'id')->active();
    }

    public function subCategories()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id')->active(); //uzsetina kategorijas pagal Id
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeParents($query)
    {
        return $query->where('parent_id', 0);


    }
}


