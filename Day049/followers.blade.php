@extends('layouts.app')

@section('title', 'Profile')

@section('content')
{{-- include header --}}
@include('users.profile.header')

{{-- include posts --}}
@if ($user->followers()->count() > 0)
<div class="mt-5 w-50 mx-auto">
    <h2 class="text-muted">Followers</h2>
    @foreach ($user->followers as $follower)
        <div class="row align-items-center mb-2">
            <div class="col-auto">
                <a href="{{ route('profile.show', $follower->follower->id) }}" class="text-decoration-none">
                    @if ($follower->follower->avatar)
                        <img src="{{ asset('/storage/images/'.$follower->follower->avatar) }}" alt="{{ $follower->follower->avatar }}" class="rounded-circle user-avatar" style="width:2.1rem;height:2.1rem;">
                    @else
                        <i class="fa-solid fa-circle-user nav-icon"></i>
                    @endif
                </a>
            </div>
            <div class="col ps-0">
                <a href="{{ route('profile.show', $follower->follower->id) }}" class="text-decoration-none text-dark text-uppercase">{{ $follower->follower->name }} </a>
            </div>
            <div class="col-auto text-end">
                @if (Auth::user()->following()->where('following_id', '=', $follower->follower->id)->exists())
                <form action="{{ route('follow.destroy', $follower->follower->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                        Unfollow
                    </button>
                </form>
            @else
                <form action="{{ route('follow.store', $follower->follower->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-secondary">
                        Follow
                    </button>
                </form>
            @endif
            </div>
        </div>
    @endforeach
</div>
@else
<div class="mt-5 w-50 mx-auto">
    <h2 class="text-muted">No followers.</h2>
</div>
@endif
@endsection
