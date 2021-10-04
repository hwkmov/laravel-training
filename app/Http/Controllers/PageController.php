<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Pageview;

class PageController extends Controller
{
    public function show(Request $request, $page_slug)
    {
        $categories = Category::withCount('posts')->get();
        $new_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $pageviews = Pageview::where('url', 'like', '%/post%')
                             ->orderByDesc('pageviews')->limit(5)->get();

        $item = Page::where('slug', $page_slug)->first();
        if(empty($item)) {
            return view('page_not_found', ['title' => 'ページがありません', 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
        } else {
            return view('page', ['title' => $item->title, 'item' => $item, 'new_posts'=>$new_posts, 'categories' => $categories, 'pageviews' => $pageviews]);
        }
    }
}
