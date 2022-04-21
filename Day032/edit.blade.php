@extends('layouts.app')

@section('title', 'Edit')

@section('content')
    <h1 class="h4">Edit Task</h1>

    <form action="" method="post" class="mb-3 row">
        @csrf
        <div class="input-group">
            <input type="text" name="task" placeholder="Edi a task" value="{{ $task->task }}" id="" class="form-control">
            <button type="submit" class="btn btn-info"><i class="fas fa-plus"></i> Update</button>
            @error('task')
            <p class="text-danger small">{{$message}}</p>
            @enderror
        </div>
        
    </form>

@endsection

