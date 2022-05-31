@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row row-cols-xl-5 g-1">
    @if (Auth::user()->logs->count() > 0)
        @foreach ($all_logs as $log)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                <div class="card h-100">
                    <img src="{{ asset('storage/images/'.$log->image) }}" class="card-img " alt="log image" style="max-width: 100%;height: auto;">
                    @if (Auth::user()->id == $log->user_id)
                        <div class="dropdown float-end position-absolute top-0 end-0">
                            <a class="dropdown-toggle btn btn-sm border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a href="{{ route('log.edit', $log->id) }}" class="dropdown-item">
                                        EDIT
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-{{ $log->id }}').submit();">DELETE</a>
                                    <form action="{{ route('log.destroy', $log->id) }}" method="post" id="delete-{{ $log->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <p class="card-text d-block">{!! nl2br(e($log->description)) !!}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col my-1">
                                <a class="btn btn-sm btn-success w-100" data-bs-toggle="modal" href="#spotmap-{{ $log->spot_id }}" role="button">Map</a>
                            </div>
                            <div class="col my-1">
                                <a class="btn btn-sm btn-primary w-100" data-bs-toggle="modal" href="#user-{{ $log->user_id }}" role="button">Angler</a>
                            </div>
                        </div>
                    </div>
                    @include('modals.status')
                </div>
            </div>
        @endforeach
    </div>
    @else
        <div class="text-center">
            <a href="{{ route('log.create') }}" class="text-decoration-none">Create your first log!!</a>
        </div>
    @endif
</div>
@endsection
