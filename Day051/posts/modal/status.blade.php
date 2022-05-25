{{-- deactivate --}}

<!-- Modal -->
<div class="modal fade" id="deactivate-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger">
                    <i class="fas-fa-post-slash"></i> Hide post
                </h5>
            </div>
            <div class="modal-body">
                Are you sure to hide this post?
                <div class="mt-3 text-center">
                    @if ($post->image)
                        <img src="{{ asset('storage/images/'.$post->image) }}" alt="avatar" class="img-fluid mx-auto d-block" style="width: 50%;">
                    @endif
                    <p class="mt-1 text-muted text-center">{{ $post->description }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.post.deactivate', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hide</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="activate-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h5 class="modal-title text-success">
                    <i class="fas-fa-post-check"></i>  Unhide post
                </h5>
            </div>
            <div class="modal-body">
                Are you sure to Unhide this post?
                <div class="mt-3 text-center">
                    @if ($post->image)
                        <img src="{{ asset('storage/images/'.$post->image) }}" alt="avatar" class="img-fluid mx-auto d-block" style="width: 50%;">
                    @endif
                    <p class="mt-1 text-muted text-center">{{ $post->description }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.post.activate', $post->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Unhide</button>
                </form>
            </div>
        </div>
    </div>
</div>

