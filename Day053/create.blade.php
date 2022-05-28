@extends('layouts.app')

@section('title', 'Create log')

@section('content')
<div class="card mx-auto w-75">
    <div class="card-body">

        <form action="#" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="mb-3 col-xl-6">
                    <label for="spot" class="form-label d-block fw-bold">
                       Spot
                    </label>
                    @isset($lat)
                        <div id="map" style="height:200px"></div>
                    @endisset

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success d-block" data-bs-toggle="modal" data-bs-target="#getCurrentLocation" onclick="initMap()">
                      Get Location
                    </button>

                    <label for="form-label" for='lat'>latitude</label>
                    <input type="text" name="lat" class="lat_input form-control">
                    <label for="lng" class="form-label">longtitude</label>
                    <input type="text" name="lng" class="lng_input form-control">
                    @error('spot')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" id="description" rows="3" class="form-control" placeholder="Whats on hour mind">{{ old ('description')}}</textarea>
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

            <button type="submit" class="btn btn-primary px-5">Post</button>
        </form>
    </div>
</div>
    @include('users.logs.modal.status')

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/getLocation.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=???" async defer>
    </script>
@endsection
