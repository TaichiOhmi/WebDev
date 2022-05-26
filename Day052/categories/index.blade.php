@extends('layouts.app')

@section('title', 'Admin:categories')

@section('content')
@isset($all_categories)
    <div class="justify-content-between d-flex">
        <button class="btn btn-outline-secondary mb-1" data-bs-toggle="modal" data-bs-target="#create-category">
            <i class="fas fa-tag"></i> New Category
        </button>
        {{ $all_categories->links() }}
    </div>
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead>
            <tr class="small table-success text-secondary">
                <th scope="col" >ID</th>
                <th scope="col">NAME</th>
                <th scope="col">STATUS</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>
                    {{ $category->name }}
                </td>
                <td>
                    <i class="fa-solid fa-circle text-{{ $category->deleted_at ? 'secondary' : 'success' }}"></i>{{ $category->deleted_at ? ' Hiding' : ' Showing' }}
                </td>
                <td>
                    @if (!$category->trashed())
                        <button class="btn btn-sm btn-outline-info w-100" data-bs-toggle="modal" data-bs-target="#edit-category-{{ $category->id }}">
                            <i class="fas fa-wrench"></i> EDIT
                        </button>
                    @endif
                </td>
                <td>
                    @if ($category->trashed())
                        <button class="btn btn-sm btn-outline-success w-100" data-bs-toggle="modal" data-bs-target="#activate-category-{{ $category->id }}">
                            <i class="fa-solid fa-check"></i> Unhide category
                        </button>
                    @else
                        <button class="btn btn-sm btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#deactivate-category-{{ $category->id }}">
                            <i class="fas fa-eye-slash"></i> Hide category
                        </button>
                    @endif
                    @include('admin.categories.modal.status')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endisset
@endsection


