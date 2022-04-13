@extends('layouts.app')

@section('title', 'All Posts')

@section('header')
<h1>All Posts</h1>
@endsection

@section('content')
@isset($post_titles)
<ul>
@foreach($post_titles as $post_title)
    <li>{{$post_title}}</li>
@endforeach
</ul>
<!-- {{print_r($post_titles)}} -->
@endisset
@endsection

@section('footer')
<p>This is the footer</p>
@endsection

