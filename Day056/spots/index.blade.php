@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div id="map" style="height:500px"></div>
    {!! Form::open(['route' => 'spots.currentLocation','method' => 'get']) !!}
    {{--隠しフォームでresult.currentLocationに位置情報を渡す--}}
    {{--lat用--}}
    {!! Form::hidden('lat','lat',['class'=>'lat_input']) !!}
    {{--lng用--}}
    {!! Form::hidden('lng','lng',['class'=>'lng_input']) !!}
    {{--setlocation.jsを読み込んで、位置情報取得するまで押せないようにdisabledを付与し、非アクティブにする。--}}
    {{--その後、disableはfalseになるようにsetlocation.js内に記述した--}}
    {!! Form::submit("current location", ['class' => "btn btn-success btn-block",'disabled']) !!}
    {!! Form::close() !!}
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="{{ asset('js/setLocation.js') }}"></script>
</div>
@endsection
