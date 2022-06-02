@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div id="map" style="height:500px"></div>
</div>
<ul>
    <li>lat: <span id="lat"></span></li>
    <li>lng: <span id="lng"></span></li>
</ul>
<script src="{{ asset('js/getLocation.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyDSFzfAkroNoEzVynr4ARSVRyOAJ8KkRHU&callback=initMap" async defer>
</script>
@endsection
