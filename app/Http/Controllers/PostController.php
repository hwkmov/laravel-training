<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Pageview;

class PostController extends Controller
{
    public function index(Request $request) 
    {
        $items = Post::all();
        $categories = Category::withCount('posts')->get();
        $new_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $pageviews = Pageview::where('url', 'like', '%/post%')
                             ->orderByDesc('pageviews')->limit(5)->get();

        return view('post', ['items' => $items, 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
    }

    public function category(Request $request, $category_slug) 
    {
        $items = Category::where('slug', $category_slug)->first()->posts;
        $categories = Category::withCount('posts')->get();
        $new_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $pageviews = Pageview::where('url', 'like', '%/post%')
                             ->orderByDesc('pageviews')->limit(5)->get();

        return view('post_list', ['keyword'=> $category_slug, 'items' => $items, 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
    }

    public function tag(Request $request, $tag_slug) 
    {
        $items = Tag::where('slug', $tag_slug)->first()->posts;
        $categories = Category::withCount('posts')->get();
        $new_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $pageviews = Pageview::where('url', 'like', '%/post%')
                             ->orderByDesc('pageviews')->limit(5)->get();

        return view('post_list', ['keyword'=> $tag_slug, 'items' => $items, 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
    }

    public function show(Request $request, $post_slug)
    {
        $item = Post::where('slug', $post_slug)->first();
        $categories = Category::withCount('posts')->get();
        $new_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $pageviews = Pageview::where('url', 'like', '%/post%')
                             ->orderByDesc('pageviews')->limit(5)->get();

        return view('post', ['item' => $item, 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
    }
}
