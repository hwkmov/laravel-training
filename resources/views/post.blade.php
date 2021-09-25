@extends('layout')

@section('content')
    @foreach ($items as $item)
        <h1>{{$item->title}}</h1>
        <p>カテゴリ：{{$item->category_id}}<br>
        タグ：{{$item->id}}<br>
        {{$item->created_at}}</p>
        <p><img src="{{ asset('storage/'.$item->image) }}" width="600px"></p>
        <p><?=$item->body?></p>
    @endforeach
@endsection
