@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <h1 class="h4">Todo App</h1>
    {{-- <form action="/store" method="post" class="mb-3 row"> --}}
    <form action="{{ route('store') }}" method="post" class="mb-3 row">
        @csrf
        {{-- <div class="col-10 mb-3">
            <input type="text" name="task" placeholder="Create a task" id="" class="form-control">
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-info"><i class="fas fa-plus"></i>Add</button>
        </div> --}}
        <div class="input-group">
            <input type="text" name="task" placeholder="Create a task" id="" class="form-control">
            <button type="submit" class="btn btn-info"><i class="fas fa-plus"></i>Add</button>
        </div>
    </form>
    @if ($errors->any())
    
    {{-- Retrieving All Error Messages For All Fields --}}
    {{-- <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> --}}

    {{-- Retrieving The First Error Message For A Field --}}
    <div class="text-danger mb-3">
        {{$errors->first('task');}}
    </div>

    {{-- Retrieving All Error Messages For A Field --}}
    {{-- <div class="text-danger">
        <ul style="list-style: none; padding:0;">
            @foreach ($errors->get('task') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> --}}

    @endif

@endsection

