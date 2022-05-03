@extends('layouts.app')

@section('title', 'show-items')

@section('content')
    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message')}}
        <a href="{{ route('cart.index') }}" class="ms-auto">Cart!</a>
    </div>
    @endif
    @isset($all_items)
    {{ $all_items->links() }}
    <table class="table">
        <thead>
        <tr class="table-dark">
            <th scope="col" style="width: 20%">Item Name</th>
            <th scope="col" style="width: 10%">Price</th>
            <th scope="col" style="width: 30%">Description</th>
            <th scope="col" style="width: 20%">Quality</th>
            <th scope="col" style="width: 10%">Actions</th>
            <th scope="col" style="width: 10%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($all_items as $item)
        <tr>
            <td>{{$item->itemName}}</td>
            <td>{{$item->itemPrice}}</td>
            <td>{{$item->itemDescription}}</td>
            <td>{{$item->itemQuality}}</td>
            <td colspan="2">
                <div class="d-block">
                    <a href="{{ route('edit',$item->id) }}" class="btn btn-warning float-start"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('destroy',$item->id) }}" method="post" class="float-start">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ms-1"><i class="fas fa-trash"></i></button>
                    </form>
                    <form action="{{ route('cart.store') }}" method="post" class="float-start">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="item_id" value="{{$item->id}}">
                        <input type="hidden" name="itemName" value="{{$item->itemName}}">
                        <button type="submit" class="btn btn-info ms-1"><i class="fas fa-cart-plus"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endisset
@endsection

