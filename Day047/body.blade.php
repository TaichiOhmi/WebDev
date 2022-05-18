{{-- clickable post image --}}
<div class="container p-0">
    <a href="{{ route('post.show', $post->id) }}">
        <img src="{{ asset('storage/images/'.$post->image) }}" alt="{{ $post->image }}" class="card-img rounded-0">
    </a>
</div>

{{-- details of the post --}}
<div class="card-body">
    <div class="row align-items-center">
        <div class="col-auto">
            {{-- like heart button --}}
            {{-- @if($post->likes->where('user_id', '=', Auth::user()->id)->count()) --}}
            @if ($post->isLiked())
                <form action="{{ route('like.destroy',$post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm shadow-none ps-0">
                        <i class="fas fa-heart text-danger" style="font-size: 1.5rem"></i>
                    </button>
                    <span>{{ $post->likes->count() }}</span>
                </form>
            @else
                <form action="{{ route('like.store',$post->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm shadow-none ps-0">
                        <i class="far fa-heart" style="font-size: 1.5rem"></i>
                    </button>
                    <span>{{ $post->likes->count() }}</span>
                </form>
             @endif
            {{-- like button --}}
        </div>
        <div class="col">
            @foreach ($post->categoryPost as $category_post)
                <div class="badge bg-secondary bg-opacity-50 text-wrap">
                    {{ $category_post->category->name }}
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong>{{ $post->user->name }}</strong>&nbsp;
            <p class="d-inline text-muted">{{ $post->description }}</p>
        </div>
    </div>
</div>

