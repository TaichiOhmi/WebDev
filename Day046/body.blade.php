{{-- clickable post image --}}
<div class="container p-0">
    <a href="{{ route('post.show', $post->id) }}">
        <img src="{{ asset('storage/images/'.$post->image) }}" alt="{{ $post->image }}" class="card-img rounded-0">
    </a>
</div>

{{-- details of the post --}}
<div class="card-body">
    <div class="row align-items-center">
        {{-- heart button --}}
        <div class="col-auto">

            @if ($post->likes->where('user_id', '=', Auth::user()->id)->count() > 0)
                <form action="{{ route('like.destroy',$post->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm shadow-none ps-0">
                        <i class="fas fa-heart text-danger" style="font-size: 1.5rem"></i>
                    </button>
                    <span>{{ $post->likes->count() }}</span>
                </form>
            @else
                <form action="{{ route('like.create',$post->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm shadow-none ps-0">
                        <i class="far fa-heart" style="font-size: 1.5rem"></i>
                    </button>
                    <span>{{ $post->likes->count() }}</span>
                </form>
             @endif
            {{-- number of likes --}}
            {{-- <span>{{ $post->likes->count() }}</span> --}}
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
    {{-- <div class="row">
        <div class="col">
            <form action="#" method="post" class="px-0 my-3">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm p-0 ps-1" placeholder="Write your comment here" aria-label="comment" aria-describedby="comment" name="comment">
                    <textarea class="form-control form-control-sm py-auto ps-1" placeholder="Write your comment here" id="" rows="1" name="comment"></textarea>
                    <button type="submit" class="btn btn-success p-1">Submit</button>
                </div>
                @error('comment')
                    {{ $message }}
                @enderror
            </form>
        </div>
    </div> --}}
</div>

