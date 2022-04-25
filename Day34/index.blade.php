@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <div class="mb-3 p-0">Create an Item</div>
    <form action="{{ route('store') }}" method="post" class="px-0">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Create an item name" aria-label="itemName" aria-describedby="itemName" name="itemName">
            <span class="input-group-text" id="itemName">@</span>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Create an item description" aria-label="itemDescription" aria-describedby="itemDescription" name="itemDescription">
            <span class="input-group-text" id="itemDescription">@</span>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Create an item price" aria-label="itemPrice" aria-describedby="itemPrice" name="itemPrice">
            <span class="input-group-text" id="itemPrice">@</span>
        </div>
        <div class="input-group mb-3">
            <select class="form-select" id="itemQuality" name="itemQuality">
                <option selected hidden disabled>Select a condition for the item</option>
                <option value="Excellent Condition">Excellent Condition</option>
                <option value="Fair Condition">Fair Condition</option>
                <option value="Used - Good Condition">Used - Good Condition</option>
                <option value="Bad - Rough Condition">Bad - Rough Condition</option>
            </select>
            <span class="input-group-text" id="itemQuality">@</span>
        </div>
        <button type="submit" class="btn btn-success w-100">Save Item</button>
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

