@extends('layouts.app')

@section('title', 'show-items')

@section('content')
    {{-- <a href="{{ route('createUser') }}">Create User</a> --}}
    {{-- <table class="table table-flex">
        <thead>
        <tr class="table-dark">
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Address</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @isset($all_users)
        @foreach($all_users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->age}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->phone_number}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{ route('editUser',$user->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            </td>
            <td>
                <form action="{{ route('destroyUser',$user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ms-1"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        @endisset
        </tbody>
    </table> --}}
    @isset($all_users)
    <div class="col-6 p-0">
        <a href="{{ route('createUser') }}" class="btn btn-info">Create User</a>
    </div>
    <div class="col-6 p-0">
        {{ $all_users->links() }}
    </div>
    <table class="table table-flex">
        <thead>
            <tr class="table-dark">
                <th scope="col" style="width: 20%">Name</th>
                <th scope="col" style="width: 5%">Age</th>
                <th scope="col" style="width: 10%">Gender</th>
                <th scope="col" style="width: 20%">Address</th>
                <th scope="col" style="width: 15%">Phone Number</th>
                <th scope="col" style="width: 20%">Email</th>
                <th scope="col" style="width: 5%">Actions</th>
                <th scope="col" style="width: 5%"></th>
            </tr>
        </thead>
        <tbody>
    @foreach($all_users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->age}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->phone_number}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{ route('editUser',$user->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            </td>
            <td>
                <form action="{{ route('destroyUser',$user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ms-1"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    @endisset
    </tbody>
    </table>
@endsection

