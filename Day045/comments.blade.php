
<div class="px-2 my-3">
    {{-- show all comments --}}
    @if ($post->comments->isNotEmpty())
        <ul class="list-group border-0">
            @dump($post->comments->count())
            @foreach ($post->comments->take(3) as $comment)
                <li class="list-group-item">
                    <strong>{{ $comment->user->name }}</strong>
                    &nbsp;
                    <p class="d-inline fw-light">{{ $comment->body }}</p>
                    {{-- if its your commetn, display option to delete --}}
                    @if ($comment->user->id == Auth::user()->id)
                        <form action="{{ route('comment.destroy', $comment->id) }}" method="post" class="d-inline float-end">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    @endif
                    {{-- make delete work --}}
                </li>
            @endforeach
            {{-- if the post has more than 3 comments, show option to view all commetns in show.blade.php --}}
            @if ($post->comments->count() > 3)
                <a href="{{ route('post.show', $post->id) }}" class="ms-auto">view all comments ({{$post->comments->count()}})</a>
            @endif
        </ul>
    @endif
</div>

<div class="card-footer px-2">
    <form action="{{ route('comment.store', $post->id) }}" method="post">
        @csrf
        <div class="input-group">
            <textarea name="comment_body{{ $post->id }}" class="form-control form-control-sm" rows="1" placeholder="Add a comment">{{ old('comment_body'.$post->id) }}</textarea>
            <button type="submit" class="btn btn-sm btn-outline-info">Post</button>
        </div>
        @error('comment_body'.$post->id)
            <p class="text-danger small">{{ $message }}</p>
        @enderror
    </form>
</div>
