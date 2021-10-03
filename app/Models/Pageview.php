<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Pageview extends Model
{
    use HasFactory;
    
    public function post()
    {
        return $this->hasOne('App\Models\Post', 'slug', 'slug');
    }
}
