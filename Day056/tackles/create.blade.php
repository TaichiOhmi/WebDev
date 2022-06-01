@extends('layouts.app')

@section('title', 'Create log')

@section('content')
<div class="container-sm">
<div class="card mx-auto w-75">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col">
                <form action="{{ route('tackle.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="form-floating">
                        <select class="form-select" id="categories" aria-label="select category" name="category">
                            <option selected hidden>Open this select menu</option>
                            <option value="lures">Lures</option>
                            <option value="reels">Reels</option>
                            <option value="rods">Rods</option>
                            <option value="accessories">Accessories</option>
                        </select>
                        <label for="categories">
                            Categories
                        </label>
                        @error('category')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div> --}}
                    <div class="input-group">
                        <label for="categories" class="input-group-text">
                            Categories
                        </label>
                        <select class="form-select" id="categories" aria-label="select category" name="category">
                            <option selected hidden>Open this select menu</option>
                            <option value="lures">Lures</option>
                            <option value="reels">Reels</option>
                            <option value="rods">Rods</option>
                            <option value="accessories">Accessories</option>
                        </select>
                    </div>
                    @error('category')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror

                    <div class="mb-3">

                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="maker">Maker</label>
                        <select class="form-select" id="maker" aria-label="select category" name="category">
                            <option selected hidden>Choose Maker</option>
                            <option value="daiwa">Daiwa</option>
                            <option value="shimano">Shimano</option>
                            <option value="abugarcia">Abu Garcia</option>
                            <option value="majorcraft">Major Craft</option>
                            <option value="palms">Palms</option>
                            <option value="...">...</option>
                        </select>
                        <label class="input-group-text" for="name">Tackle Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Tackle Name" value="{{ old('name') }}">

                    </div>
                    @error('maker')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                    @error('name')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror



                    <div class="mb-3">
                        <input type="file" name="image" id="" class="form-control">
                        @error('image')
                        <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
