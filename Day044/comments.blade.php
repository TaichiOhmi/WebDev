<div class="card-footer">
    <div class="mt-3 mb-1">
        {{-- show all comments --}}
        {{-- @dump($post->comments) --}}
        <ul class="list-group">
        @foreach ($post->comments as $comment)
        {{-- @dump($comment) --}}
                <li class="list-group-item">
                    <span class="me-3 fw-bold"></span>
                    {{ $comment->body }}
                </li>
        @endforeach
        </ul>
    </div>
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
