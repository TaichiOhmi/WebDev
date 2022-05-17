@extends('layouts.app')

@section('title', 'Home')
@section('content')
    {{-- @dump($all_posts) --}}
    <div class="row gx-5">
        <div class="col-8">
            @if ($all_posts->isNotEmpty())
                @foreach ($all_posts as $post)
                    <div class="card mb-3">
                        {{-- title --}}
                        @include('users.posts.content.title')
                        {{-- body --}}
                        @include('users.posts.content.body')
                        {{-- comments --}}
                        @include('users.posts.content.comments')
                    </div>
                @endforeach
            @else
                    {{-- if there is not post yet --}}
                    <div class="text-center">
                        <h2>Share Photos</h2>
                        <p class="text-muted">When you share photos, They'll appear on your wall</p>
                        <a href="{{ route('post.create') }}" class="text-decoration-none">Shere your first photo</a>
                    </div>
            @endif
        </div>
        <div class="col-4 bg-secondary">
            {{-- Profile Overview --}}
            Profile Overview

            {{-- Suggestions --}}
            Suggestions
        </div>
    </div>
@endsection
