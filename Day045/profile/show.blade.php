@extends('layouts.app')

@section('title', 'Profile')

@section('content')
{{-- include header --}}
@include('users.profile.header')

{{-- include posts --}}
@if ($user->posts->isNotEmpty())
    <div class="row">
        @foreach ($user->posts as $post)
            <div class="col mb-4">
                <a href="#">
                    <img src="{{ asset('storage/images/'.$post->image) }}" alt="image" style="width:100%;height:300px;">
                </a>
            </div>
        @endforeach
    </div>
@endif
@endsection
