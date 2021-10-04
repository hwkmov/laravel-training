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
        $categories = Category::withCount('posts')->get();
        $new_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $pageviews = Pageview::where('url', 'like', '%/post%')
                             ->orderByDesc('pageviews')->limit(5)->get();
        
        $item = Post::all()->first();
        if(empty($item)) {
            return view('post_not_found', ['title' => '投稿がありません', 'item' => $item, 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
        } else {
            return view('post', ['title' => $item->title, 'item' => $item, 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
        }
    }

    public function category(Request $request, $category_slug) 
    {
        $categories = Category::withCount('posts')->get();
        $new_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $pageviews = Pageview::where('url', 'like', '%/post%')
                             ->orderByDesc('pageviews')->limit(5)->get();

        $category = Category::where('slug', $category_slug)->first();
        if(empty($category)) {
            return view('post_not_found', ['title' => '投稿がありません', 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
        } else {
            $items = $category->posts;
            return view('post_list', ['title' => $category->name, 'keyword'=> $category->name, 'items' => $items, 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
        }
    }

    public function tag(Request $request, $tag_slug) 
    {
        $categories = Category::withCount('posts')->get();
        $new_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $pageviews = Pageview::where('url', 'like', '%/post%')
                             ->orderByDesc('pageviews')->limit(5)->get();

        $tag = Tag::where('slug', $tag_slug)->first();
        if(empty($tag)) {
            return view('post_not_found', ['title' => '投稿がありません', 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
        } else {
            $items = $tag->posts;
            return view('post_list', ['title' => $tag->name, 'keyword'=> $tag->name, 'items' => $items, 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
        }
    }

    public function show(Request $request, $post_slug)
    {
        $categories = Category::withCount('posts')->get();
        $new_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $pageviews = Pageview::where('url', 'like', '%/post%')
                             ->orderByDesc('pageviews')->limit(5)->get();
        
        $item = Post::where('slug', $post_slug)->first();
        if(empty($item)) {
            return view('post_not_found', ['title' => '投稿がありません', 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
        } else {
            return view('post', ['title' => $item->title, 'item' => $item, 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
        }
    }
}
