@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div id="map" style="height:500px">
	</div>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyDSFzfAkroNoEzVynr4ARSVRyOAJ8KkRHU&callback=initMap" async defer>
    </script>
</div>
<script>
    const lat = {{ $lat }};
    const lng = {{ $lng }};
</script>
<script src="{{ asset('/js/currentLocation.js') }}"></script>
@endsection
