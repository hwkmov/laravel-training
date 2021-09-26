<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function parent() 
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function getParents()
    {
        $parents = [];
        $parent = $this->parent;
        while(!is_null($parent))
        {
            array_unshift($parents, $parent);
            $parent = $parent->parent;
        }

        return $parents;
    }
}
