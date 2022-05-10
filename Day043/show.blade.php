@extends('layouts.app')

@section('title', 'Show')

@section('content')
    <div class="row">
        <div class="col p-0">
            <img src="{{ asset('/storage/images/'.$post->image) }}" alt="{{ $post->image }}" class="card-img img-fluid rouded-0">
        </div>
        <div class="col-4 p-0 bg-white">
            <div class="card">
                {{-- title --}}
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col-auto">
                            @if ($post->user->image)
                            {{-- display image --}}
                            @else
                                <i class="fa-solid fa-circle-user nav-icon"></i>
                            @endif
                        </div>
                        <div class="col p-0">
                            <a href="#" class="text-decoration-none text-dark text-uppercase">{{ $post->user->name}}</a>
                        </div>
                        <div class="col">
                            <p>{{ $post->description }}</p>
                        </div>
                        <div class="col">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{-- categories --}}
                            @foreach ($post->categoryPost as $category_post)
                                <div class="badge bg-secondary bg-opacity-50 text-wrap ms-1">
                                    {{ $category_post->category->name }}
                                </div>
                            @endforeach
                        </div>
                        <div class="col">
                            @if (Auth::user()->id == $post->user_id)
                                <a href="{{ route('post.edit', $post->id) }}">Edit</a>
                                {{-- delete, copy title delete modal --}}
                            @endif
                        </div>
                    </div>


                </div>

                {{-- body --}}
                <div class="card-body w-100">


                </div>
            </div>
        </div>
    </div>
@endsection
