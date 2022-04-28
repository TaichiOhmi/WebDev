@extends('layouts.app')

@section('title', 'POST')
    
@section('content')
<div class="card mb-1">
    <div class="card-body">
        <h3>{{$post->title}}</h3>
        <div class="text-muted">{{ $post->user->name}}</div>
        <p class="card-text">{{ $post->body}}</p>
        <img src="{{ asset('storage/images/'.$post->image) }}" alt="post image" class="img-fluid mb-2" style="max-width: 100%; , height: auto;">
    </div>
</div>
@endsection