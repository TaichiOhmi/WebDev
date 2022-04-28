@extends('layouts.app')

@section('title', 'Home')
    
@section('content')
@isset($all_posts)
{{ $all_posts->links() }}
@foreach($all_posts as $post)
<div class="card mb-1">
    <div class="card-body">
        <a href="{{ route('post.show', $post->id) }}" class="h3">{{$post->title}}</a>
        <p class="card-text">{{ $post->body}}</p>
        @if (Auth::user()->id == $post->user_id)
            <form action="{{ route('post.destroy', $post->id) }}" method="post" class="float-end">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ms-1"><i class="fas fa-trash"></i> DELETE</button>
            </form>
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary float-end"><i class="fas fa-edit"></i> EDIT</a>
        @endif
    </div>
</div>
@endforeach
@endisset
@endsection

