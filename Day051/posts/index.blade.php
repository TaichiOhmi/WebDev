@extends('layouts.app')

@section('title', 'Admin:posts')

@section('content')
@isset($all_posts)
    {{-- {{ $all_posts->links() }} --}}
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead>
            <tr class="small table-success text-secondary">
                <th scope="col" >ID</th>
                <th scope="col">IMAGE</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">OWNER</th>
                <th scope="col">CREATED AT</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>
                    @if ($post->image)
                        <img src="{{ asset('/storage/images/'.$post->image) }}" alt="post image" class="" style="width:5rem;height:5rem; object-fit:cover;">
                    @else
                        <i class="fas fa-post-circle d-block text-center" style="font-size: 5rem;"></i>
                    @endif
                </td>
                <td>
                    @foreach ($post->categoryPost as $category_post)
                        <div class="badge bg-secondary bg-opacity-50 text-wrap mb-1">
                            {{ $category_post->category->name }}
                        </div>
                    @endforeach
                </td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->created_at}}</td>
                <td>
                    <i class="fa-solid fa-circle text-{{ $post->deleted_at ? 'secondary' : 'success' }}"></i>{{ $post->deleted_at ? ' Hiding' : ' Showing' }}
                </td>
                <td colspan="2">
                    @if (Auth::user()->id != $post->id)
                        @if ($post->trashed())
                            <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#activate-post-{{ $post->id }}">
                                <i class="fa-solid fa-check"></i> Unhide Post
                            </button>
                        @else
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deactivate-post-{{ $post->id }}">
                                <i class="fas fa-eye-slash"></i> Hide Post
                            </button>
                        @endif
                        @include('admin.posts.modal.status')
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endisset
@endsection


