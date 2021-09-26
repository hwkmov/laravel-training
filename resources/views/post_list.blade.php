@extends('layout')

@section('content')
@if($items->isNotEmpty())
    <p class="category-title">{{ $items[0]->category->name }}の投稿一覧</p>
    @foreach ($items as $item)
        <div class="article-item">
            <a href="{{ url('/post/'.$item->slug) }}">
                <h2>{{ $item->title }}</h2>
                <p>{{ $item->category->name }}
                タグ：{{ $item->id }}<br>
                {{ $item->created_at }}</p>
                <p class="excerpt">{{ $item->excerpt }}</p>
            </a>
        </div>
    @endforeach
@else
    <p>投稿がありません</p>
@endif
@endsection
