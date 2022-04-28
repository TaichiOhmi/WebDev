@extends('layouts.app')

@section('title','Create Post')
    
@section('content')
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label text-muted">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title here" autofocus>
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label text-muted">Body</label>
            <textarea name="body" id="body" cols="5" class="form-control" placeholder="Start writing ..."></textarea>
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
        <button type="submit" class="btn btn-primary px-5">Post</button>
    </form>
@endsection