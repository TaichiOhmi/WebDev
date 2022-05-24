@extends('layouts.app')

@section('title', 'Admin:users')

@section('content')
@isset($all_user)
    <div class="">
        {{ $all_user->links() }}
    </div>
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead>
            <tr class="small table-success text-secondary">
                <th scope="col"></th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">CREATED AT</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_user as $user)
            <tr>
                <td>
                    @if ($user->avatar)
                        <img src="{{ asset('/storage/images/'.$user->avatar) }}" alt="{{ Auth::user()->avatar }}" class="user-avatar rounded-circle" style="width:3.5rem;height:3.5rem; object-fit:cover;">
                    @else
                        <i class="fas fa-user-circle d-block text-center" style="font-size: 3.5rem;"></i>
                    @endif
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>

                    <i class="fa-solid fa-circle text-{{ $user->deleted_at ? 'danger' : 'success' }}"></i>{{ $user->deleted_at ? ' Inactive' : ' Active' }}
                </td>
                <td colspan="2">
                    @if (Auth::user()->id != $user->id)
                        {{-- <div class="dropdown">
                            <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                            <div class="dropdown-menu"> --}}
                                {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{ $user->id }}">
                                    <i class="fa-solid fa-user-slash"></i> Deactivate "{{ $user->name }}"
                                </button>
                                @include('admin.users.modal.status') --}}
                            {{-- </div>
                        </div> --}}
                        @if ($user->deleted_at)
                            <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#activate-user-{{ $user->id }}">
                                <i class="fa-solid fa-check"></i> Activate User
                            </button>
                        @else
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{ $user->id }}">
                                <i class="fa-solid fa-user-slash"></i> Deactivate User
                            </button>
                        @endif
                            @include('admin.users.modal.status')
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endisset
@endsection


