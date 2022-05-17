<div class="card-header bg-white py-3 ">
    <div class="row align-items-center">
        {{-- ---------------------------------------------------- --}}
        <div class="col-auto">
            <a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none">
                @if ($post->user->avatar)
                    <img src="{{ asset('/storage/images/'.$post->user->avatar) }}" alt="{{ $post->user->avatar }}" class="rounded-circle user-avatar" style="width:2.1rem;height:2.1rem;">
                @else
                    <i class="fa-solid fa-circle-user nav-icon"></i>
                @endif
            </a>
        </div>
        {{-- ----------------------------------------------------- --}}
        <div class="col ps-0">
            <a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none text-dark text-uppercase">{{ $post->user->name }} </a>
        </div>
        <div class="col-auto text-end">
            @if (Auth::user()->id == $post->user->id)
            <div class="dropdown">
                <button class="btn btn-sm shadow-none" data-bs-toggle="dropdown">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>
                    <div class="dropdown-menu">
                        <a href="{{ route('post.edit',$post->id) }}" class="dropdown-item">
                            <i class="fa-solid fa-pen me-1"></i>Edit
                        </a>
                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}">
                            <i class="fa-solid fa-trash me-1"></i>Delete
                        </button>
                    </div>
            </div>
            @else
                <form action="#" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-secondary">
                        Unfollow
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="delete-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                    <h5 class="modal-title text-danger"><i class="fa-solid fa-circle-exclamation"></i>Delete Post</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <p>Are you sure you want to do delete this post?</p>
                <div class="mt-3">
                    <img src="{{ asset('storage/images/'.$post->image) }}" alt="" class="delete-post-img img-fluid">
                    <p class="mt-1 text-muted">{{ $post->description }}</p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('post.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
