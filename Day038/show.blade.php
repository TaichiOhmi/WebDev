@extends('layouts.app')

@section('title', 'POST')
    
@section('content')
<div class="card mb-1">
    <div class="card-body">
        <h2 class="h4 mb-0">{{$post->title}}</h3>
        <h3 class="h6 text-muted">{{ $post->user->name}}<span class="float-end">{{ $post->updated_at}}</span></h3>
        <p class="card-text mb-0">{{ $post->body}}</p>
        {{-- <div class="row pt-2">
            <div class="col-5"> --}}
                <img src="{{ asset('storage/images/'.$post->image) }}" alt="post image" class="img-fluid mb-2 img-thumbnail d-block mx-auto mt-3" style="max-height:300px; width:auto;">
            {{-- </div>
            <div class="col">
            </div>
        </div> --}}
        
        
    </div>
</div>
<form action="{{ route('comment.store', $post->id) }}" method="post" class="px-0 my-3">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Comment" aria-label="comment" aria-describedby="comment" name="comment">
        <button type="submit" class="btn btn-success">Comment</button>
    </div>
    @error('image')
        {{ $message }}
    @enderror
</form>
@isset($all_comments)
<div class="row">{{ $all_comments->links('vendor.pagination.comments') }}</div>

{{-- list-group pattern --}}
<ul class="list-group my-1">
@foreach($all_comments as $comment)
    <li class="list-group-item d-flex align-items-center">
        <div class="me-auto">
            {{$comment->user->name}}
        </div>
        <div class="me-auto">{{ $comment->comment}}</div>
        {{-- @if (Auth::user()->id == $comment->user_id) --}}
        <form action="{{ route('comment.destroy', $comment->id) }}" method="post" class="ms-auto">
            @csrf
            @method('DELETE')
            @if (Auth::user()->id == $comment->user_id)
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            @else
                <button type="submit" class="btn btn-danger" disabled><i class="fas fa-trash"></i></button>
            @endif
        </form>
        {{-- <form action="{{ route('comment.destroy', $comment->id) }}" method="post" class="ms-auto">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
        </form>
        @endif --}}
    </li>
@endforeach
</ul>
{{-- /list-group pattern --}}


{{-- table pattern --}}
{{-- <table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Comment</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($all_comments as $comment)
      <tr>
        <td>{{$comment->user->name}}</td>
        <td colspan="6">{{ $comment->comment}}</td>
        <td>
            <form action="{{ route('comment.destroy', $comment->id) }}" method="post" class="ms-auto">
                @csrf
                @method('DELETE')
                @if (Auth::user()->id == $comment->user_id)
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                @else
                    <button type="submit" class="btn btn-danger" disabled><i class="fas fa-trash"></i></button>
                @endif
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table> --}}
{{-- /table pattern --}}


@endisset
@endsection