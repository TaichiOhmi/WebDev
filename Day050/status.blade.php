{{-- deactivate --}}

<!-- Modal -->
<div class="modal fade" id="deactivate-user-{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger">
                    <i class="fas-fa-user-slash"></i> Deactivate User
                </h5>
            </div>
            <div class="modal-body">
                Are you sure to deacivate user "{{ $user->name }}"
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.delete', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Deactivate</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="activate-user-{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h5 class="modal-title text-success">
                    <i class="fas-fa-user-check"></i> Activate User
                </h5>
            </div>
            <div class="modal-body">
                Are you sure to deacivate user "{{ $user->name }}"
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.restore', $user->id) }}" method="post">
                    @csrf
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Activate</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
{{-- <div class="modal fade" id="deactivate-user-{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                    <h5 class="modal-title text-danger"><i class="fa-solid fa-circle-exclamation"></i> Deactivate</h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to do deactivate this user?</p>
                <div class="mt-3 text-center">
                    @if ($user->avatar)
                        <img src="{{ asset('storage/images/'.$user->avatar) }}" alt="avatar" class="deactivate-user-img img-fluid rounded-circle mx-auto d-block" style="width: 50%;">
                    @else
                        <i class="fas fa-user-circle nav-icon mx-auto" style="font-size: 10rem;"></i>
                    @endif
                    <p class="mt-1 text-muted text-center">{{ $user->name }}</p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="#" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">deactivate</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
