@extends('layouts.app')

@section('title', 'Home')
@section('content')
    {{-- @dump($all_posts) --}}
    {{-- @dump($suggestions) --}}
    <div class="row gx-5">
        <div class="col-8">
            @if (Auth::user()->hasPost() || Auth::user()->posts->count() > 0)
                @if ($all_posts->isNotEmpty())
                    @foreach ($all_posts as $post)
                        {{--   --}}
                        @if ($post->user->isFollowed() || $post->user->id == Auth::user()->id)
                        {{-- @if (Auth::user()->isFollowing($post->user->id) ||  Auth::user()->id == $post->user->id) --}}
                            <div class="card mb-3">
                                {{-- title --}}
                                @include('users.posts.content.title')
                                {{-- body --}}
                                @include('users.posts.content.body')
                                {{-- comments --}}
                                @include('users.posts.content.comments')
                            </div>
                        @endif
                    @endforeach
                @else
                    {{-- if there is not post yet --}}
                    <div class="text-center">
                        <h2>Share Photos</h2>
                        <p class="text-muted">When you share photos, They'll appear on your wall</p>
                        <a href="{{ route('post.create') }}" class="text-decoration-none">Shere your first photo</a>
                    </div>
                @endif
            @else
                {{-- if there is not post yet --}}
                <div class="text-center">
                    <h2>Share Photos</h2>
                    <p class="text-muted">When you share photos, They'll appear on your wall</p>
                    <a href="{{ route('post.create') }}" class="text-decoration-none">Shere your first photo</a>
                </div>
            @endif
        </div>
        <div class="col-4">
            {{-- Profile Overview --}}
            <div class="row shadow-sm rounded p-1">
                <div class="col-auto">
                    <a href="{{ route('profile.show', Auth::user()->id) }}" class="text-decoration-none">
                        @if (Auth::user()->avatar)
                            <img src="{{ asset('/storage/images/'.Auth::user()->avatar) }}" alt="{{ Auth::user()->avatar }}" class="img-fluid img-thumbnail rounded-circle" width="50" height="" style="">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon" style="font-size:50px;"></i>
                        @endif
                    </a>
                </div>
                <div class="col d-flex align-items-center text-truncate">
                    <a href="{{ route('profile.show', Auth::user()->id) }}" class="text-decoration-none text-dark">
                        {{ Auth::user()->name }}
                    </a>
                </div>
                <div class="col-auto"></div>
            </div>

            {{-- Suggestions --}}
            @isset($suggestions)
                <div class="row mt-5">
                    Suggestions for you
                    <ul class="list-unstyled">
                    @foreach ($suggestions as $suggestion)
                        <li class="mt-2 d-flex">
                            {{-- <div class="row">
                                <div class="col-auto"> --}}
                                    <a href="{{ route('profile.show', $suggestion->id) }}" class="text-decoration-none me-2">
                                        @if ($suggestion->avatar)
                                            <img src="{{ asset('/storage/images/'.$suggestion->avatar) }}" alt="{{ $suggestion->avatar }}" class="img-fluid img-thumbnail rounded-circle" width="50" height="50" style="">
                                        @else
                                            <i class="fa-solid fa-circle-user text-secondary d-block text-center" style="font-size:45px;"></i>
                                        @endif
                                    </a>
                                {{-- </div>
                                <div class="col d-flex align-items-center"> --}}
                                    <a href="{{ route('profile.show', $suggestion->id) }}" class="text-decoration-none text-dark me-auto my-auto text-truncate" style="width:10rem;">
                                        {{ $suggestion->name }}
                                    </a>
                                {{-- </div>
                                <div class="col-auto d-flex align-items-center"> --}}
                                    <form action="{{ route('follow.store', $suggestion->id) }}" method="post" class="ms-auto my-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary fw-bold">
                                            Follow
                                        </button>
                                    </form>
                                {{-- </div>
                            </div> --}}
                        </li>
                    @endforeach
                    </ul>
                </div>
            @endisset
        </div>
    </div>
@endsection
