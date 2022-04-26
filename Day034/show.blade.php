@extends('layouts.app')

@section('title', 'show-items')

@section('content')
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
            <td>
                <a href="{{ route('edit',$item->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            </td>
            <td>
                <form action="{{ route('destroy',$item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ms-1"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endisset
@endsection

