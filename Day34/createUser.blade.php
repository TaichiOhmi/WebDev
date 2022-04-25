@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <div class="mb-3 p-0">Create an User</div>
    <form action="{{ route('storeUser') }}" method="post" class="px-0">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Name" aria-label="name" aria-describedby="name" name="name">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Age" aria-label="age" aria-describedby="age" name="age">
        </div>
        <div class="input-group mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Male" name="gender" id="male">
                <label class="form-check-label" for="male">
                Male
                </label>
            </div>
            <div class="form-check ms-3">
                <input class="form-check-input" type="radio" value="Female" name="gender" id="female">
                <label class="form-check-label" for="female">
                Female
                </label>
            </div>
            <div class="form-check ms-3">
                <input class="form-check-input" type="radio" value="Other" name="gender" id="other">
                <label class="form-check-label" for="other">
                Other
                </label>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Address" aria-label="address" aria-describedby="address" name="address">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Phone Number" aria-label="phone_number" aria-describedby="phone_number" name="phone_number">
        </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="email" name="email">
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="password" name="password">
        </div>
        <button type="submit" class="btn btn-success w-100">Register User</button>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
        </div>
        @endif
    </form>


@endsection

