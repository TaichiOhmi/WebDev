@if ($all_posts)
    @foreach ($all_posts as $post)
        <div class="card mb-3">
            <div class="card-header bg-white d-inline-flex">
                @if (Auth::user()->avatar)
                    <img src="#" alt="#">
                @else
                    <i class="fas fa-user-circle nav-icon"></i>
                @endif
                <h5 class="my-auto ms-1">{{ $post->user->name}}</h5>
                <button class="btn btn-outline-secondary btn-sm ms-auto">Follow</button>
            </div>
            <img src="{{ asset('storage/images/'.$post->image) }}" class="card-img-top" alt="image">
            <div class="card-body">
                <div class="card-text">
                    <p class="d-inline-flex">
                        <i class="fas fa-heart text-black fs-3"></i>
                        <span class="ms-1">{{-- like count --}}123</span>
                        {{-- @dump($post->categoryPost) --}}
                        @foreach ($post->categoryPost as $categories)
                            <span class="badge bg-secondary ms-1 d-flex align-items-center justify-content-center h6">{{$categories->category->name}}</span>
                        @endforeach
                    </p>
                    <p><span class="fw-bolder">{{ $post->user->name }} updated </span>{{ $post->description }}</p>

                    <form action="#" method="post" class="my-3">
                        @csrf
                        <div class="input-group">
                            <textarea class="form-control" name="comment" placeholder="Write your comment here" rows="1"></textarea>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                        @error('comment')
                            {{ $message }}
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endif