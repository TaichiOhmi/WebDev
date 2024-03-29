@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="" class="form-label d-block fw-bold">
                Category <span class="text-muted fw-normal">{up to 3}</span>
            </label>
            {{-- @dump($selected_categories) --}}
            @foreach ($all_categories as $category)
                <div class="form-check form-check-inline">
                    @if (in_array($category->id, $selected_categories))
                        <input type="checkbox" name="category[]" id="{{ $category->name }}" value="{{ $category->id }}" class="form-check-input" checked>
                    @else
                        <input type="checkbox" name="category[]" id="{{ $category->name }}" value="{{ $category->id }}" class="form-check-input">
                    @endif
                    <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                </div>
            @endforeach
            @error('category')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control" placeholder="Whats on hour mind">{{ old ('description', $post->description)}}</textarea>
            @error('description')
            <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <img src="{{ asset('/storage/images/'.$post->image) }}" alt="{{ $post->image }}" class="card-img img-fluid rouded-0">
                <input type="file" name="image" id="" class="form-control mt-1">
                @error('image')
                <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-5">Post</button>
    </form>
@endsection
