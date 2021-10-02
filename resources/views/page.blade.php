@extends('layout')

@section('content')
    <h1>{{$item->title}}</h1>
    <p><img src="{{ asset('storage/'.$item->image) }}" width="600px"></p>
    <p><?=$item->body?></p>
@endsection
