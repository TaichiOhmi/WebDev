@extends('layouts.app')

@section('title', 'POST')
    
@section('content')

<div class="card mb-1">
    <div class="card-body">
        <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label text-muted">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" placeholder="Enter title here" autofocus>
                @error('title')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label text-muted">Body</label>
                <textarea name="body" id="body" cols="5" class="form-control" placeholder="Start writing ...">{{ $post->body }}</textarea>
                @error('body')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <input type="file" name="image" id="" class="form-control">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary px-5">Update</button>
        </form>
    </div>
</div>

@endsection
