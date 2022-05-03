@extends('layouts.app')

@section('title', 'show-cart')

@section('content')
<div class="w-75 mx-auto">
    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message')}}
    </div>
    @endif
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:40%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:25%">Quantity</th>
                <th style="width:15%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4>{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="Quantity">
                            <form action="{{ route('cart.update')}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="input-group input-group-sm">
                                        <input type="hidden" name="id" value="{{$id}}">
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control form-control-sm text-center" />
                                        <button class="btn btn-secondary btn-sm">Update</button>
                                </div>
                            </form>
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <form action="{{ route('cart.destroy') }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{$id}}">
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-end"><h3><strong>Total ${{ $total }}</strong></h3></td>
            </tr>
            <tr>
                <td colspan="3" class="text-start">
                    <a href="{{ route('show') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                </td>
                <td colspan="2" class="text-end">
                    <a href="{{ route('cart.checkout') }}" class="btn btn-success">Checkout</button>
                </td>
            </tr>
        </tfoot>
    </table>


    
        {{-- @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{session()->get('success_message')}}
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
                <th scope="col" colspan="2" style="width: 10%">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($all_items as $item)
            <tr>
                <td>{{$item->itemName}}</td>
                <td>{{$item->itemPrice}}</td>
                <td>{{$item->itemDescription}}</td>
                <td>{{$item->itemQuality}}</td>
                <td>
                    <form action="{{ route('cart.store') }}" method="post" class="ms-4">
                        @csrf
                        <input type="hidden" name="item_id" value="{{$item->id}}">
                        <input type="hidden" name="itemName" value="{{$item->itemName}}">
                        <input type="hidden" name="itemPrice" value="{{$item->itemPrice}}">
                        <button type="submit" class="btn btn-info ms-1"><i class="fas fa-cart-plus"></i> Add</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endisset --}}
    </div>
@endsection

