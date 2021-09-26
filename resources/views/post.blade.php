@extends('layout')

@section('content')
    <h1>{{$item->title}}</h1>
    <div class="breadcrumbs">
        カテゴリ：
        @foreach($item->category->getParents() as $parent)
            <a href="{{ url('/category/'.$parent->slug) }}">{{ $parent->name }}</a>>
        @endforeach
        <a href="{{ url('/category/'.$item->category->slug) }}">{{$item->category->name}}</a>
    </div>
    <p>
        タグ：{{ $item->id }}<br>
        {{ $item->created_at }}
    </p>
    <p><img src="{{ asset('storage/'.$item->image) }}" width="600px"></p>
    <p><?=$item->body?></p>
@endsection
