<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PageController extends Controller
{
    public function show(Request $request, $page_slug)
    {
        $item = Page::where('slug', $page_slug)->first();
        $categories = Category::withCount('posts')->get();
        $new_posts = Post::orderBy('created_at', 'desc')->take(3)->get();

        return view('page', ['item' => $item, 'new_posts'=>$new_posts, 'categories' => $categories]);
    }
}
