@extends('layout')

@section('content')
@if($items->isNotEmpty())
    <p class="category-title">{{ $keyword }}の投稿一覧</p>
    @foreach ($items as $item)
        <div class="article-item">
            <a href="{{ url('/post/'.$item->slug) }}">
                <h2>{{ $item->title }}</h2>
                <p>カテゴリ：{{ $item->category->name }}<br>
                タグ：
                @foreach($item->tags as $tag)
                    {{ $tag->name }}&nbsp;
                @endforeach
                <br>
                {{ $item->created_at }}</p>
                <p class="excerpt">{{ $item->excerpt }}</p>
            </a>
        </div>
    @endforeach
@else
    <p>投稿がありません</p>
@endif
@endsection
