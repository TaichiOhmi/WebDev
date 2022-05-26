{{-- deactivate --}}

<!-- Modal -->
<div class="modal fade" id="deactivate-category-{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger">
                    <i class="fas-fa-category-slash"></i> Hide category
                </h5>
            </div>
            <div class="modal-body">
                Are you sure to hide this category "{{ $category->name }}"?
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.category.deactivate', $category->id) }}" method="post">
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
<div class="modal fade" id="activate-category-{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h5 class="modal-title text-success">
                    <i class="fas-fa-category-check"></i>  Unhide category
                </h5>
            </div>
            <div class="modal-body">
                Are you sure to Unhide this category "{{ $category->name }}"?
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.category.activate', $category->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Unhide</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit-category-{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-info">
            <div class="modal-header border-info">
                <h5 class="modal-title text-info">
                    <i class="fas-fa-category-check"></i>  Edit category
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="input-group">
                        <input type="text" name="category" class="form-control-sm form-control" id="editInput" value="{{ old ('category', $category->name)}}" placeholder="CATEGORY">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="create-category">
    <div class="modal-dialog">
        <div class="modal-content border-primary">
            <div class="modal-header border-primary">
                <h5 class="modal-title text-primary">
                    <i class="fas-fa-category-check"></i> Create a new category
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.category.store', $category->id) }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="category" class="form-control-sm form-control" id="addInput" value="{{ old ('category')}}" placeholder="CATEGORY">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</div>


<script>
var addModal = document.getElementById('create-category')
var addInput = document.getElementById('addInput')
addModal.addEventListener('shown.bs.modal', function () {
  addInput.focus()
})
</script>
