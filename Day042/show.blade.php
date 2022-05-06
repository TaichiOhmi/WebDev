@extends('layouts.app')

@section('title', 'Show')

@section('content')
<div class="card">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card-body p-0">
                <img src="{{ asset("storage/images/$post->image") }}" alt="image" class="img-fluid">
            </div>
        </div>
        <div class="col">
            <div class="card-body">
                <div class="d-flex">
                    <a href="#" class="">
                        <i class="fas fa-user-circle nav-icon text-muted"></i>
                    </a>
                    <strong class="mx-2">{{ $post->user->name }}</strong>
                    <p class="text-break">{{ $post->description }}</p>
                </div>
                <div class="d-flex">
                    @foreach ($post->categoryPost as $category_post)
                    <div class="badge bg-secondary bg-opacity-50 text-wrap ms-1">
                        {{ $category_post->category->name }}
                    </div>
                    @endforeach
                    <div class="ms-auto">
                        <a href="#" class="">Edit</a>
                    </div>
                </div>
                <form action="#" method="post" class="my-3">
                    @csrf
                    <div class="input-group">
                        <textarea class="form-control form-control-sm" name="comment" placeholder="Write your comment here" rows="1"></textarea>
                        <button type="submit" class="btn btn-sm btn-info">Submit</button>
                    </div>
                    @error('comment')
                        {{ $message }}
                    @enderror
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
