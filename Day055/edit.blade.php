@extends('layouts.app')

@section('title', 'Edit log')

@section('content')
<div class="container-sm">
<div class="card mx-auto w-75">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col">
                <form action="{{ route('log.update', $log->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="">
                        <label for="spot" class="form-label d-block fw-bold">
                        Spot
                        </label>
                        <div class="form-floating flex-grow-1">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Spot Name" value="{{ old ('name', $log->spot->name)}}">
                            <label for="name">Name</label>
                        </div>
                        @error('name')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control" placeholder="Whats on hour mind">{{ old ('description', $log->description)}}</textarea>
                        @error('description')
                        <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>

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
    @include('users.logs.modal.status')

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/getLocation.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config('services.gmap.key') }}" async defer>
    </script>
@endsection
