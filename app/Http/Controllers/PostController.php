<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(Request $request) 
    {
        $items = Post::all();
        return view('post', ['items' => $items]);
    }
}
