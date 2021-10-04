<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/base.css') }}">
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/skeleton.css') }}">
        <title>{{ $title }} - laravel-training-cms</title>
    </head>
    <body>
        <div class="header">
            <div class="header-item">
                <span class="header-title">laravel-training-cms</span>
                <div class=search-box>
                    <input type="text" placeholder="記事の検索" class="searchbox">
                    <button class="searchbutton">検索</button>
                </div>
            </div>
            <div>
                {{ menu('header') }}
            </div>
        </div>
        <div class="main-container">
            <div class="content">
                @yield('content')
            </div>
            <div class="sidebar">
                <aside>
                    <h4>新着記事</h4>
                    <ul>
                        @foreach($new_posts as $post)
                        <li><a href="{{ url('/post/'.$post->slug) }}">{{ $post->title }}</a></li>
                        @endforeach
                    </ul>
                </aside>
                <aside>
                    <h4>人気記事</h4>
                    <ul>
                        @foreach($pageviews as $pageview)
                        <li><a href="{{ url('/post/'.$pageview->slug) }}">{{ $pageview->post->title }}</a></li>
                        @endforeach
                    </ul>
                </aside>
                <aside>
                    <h4>カテゴリ</h4>
                    <ul>
                        @foreach($categories as $category)
                        <li><a href="{{ url('/category/'.$category->slug) }}">{{ $category->name }}({{ $category->posts_count }})</a></li>
                        @endforeach
                    </ul>
                </aside>
            </div>
        </div>
        <div class="footer">
            {{ menu('footer') }}
        </div>
    </body>
</html>
