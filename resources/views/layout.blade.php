<!DOCTYPE html>
<html>
    <head>
        <title>{{ $items[0]->title }}</title>
        <link rel="stylesheet" href="{{ asset('css/base.css') }}">
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/skeleton.css') }}">
    </head>
    <body>
        <div class="header">
            <div class="header-title">laravel-training-cms</div>
            <div>
                <input type="text" placeholder="記事の検索" class="searchbox">
                <button class="searchbutton">検索</button>
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
                        <li>side bar</li>
                        <li>side bar</li>
                        <li>side bar</li>
                    </ul>
                </aside>
                <aside>
                    <h4>人気記事</h4>
                    <ul>
                        <li>side bar</li>
                        <li>side bar</li>
                        <li>side bar</li>
                    </ul>
                </aside>
                <aside>
                    <h4>カテゴリ</h4>
                    <ul>
                        <li>side bar</li>
                        <li>side bar</li>
                        <li>side bar</li>
                    </ul>
                </aside>
            </div>
        </div>
        <div class="footer">
            <div>footer</div>
        </div>
    </body>
</html>
