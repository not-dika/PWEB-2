@extends('layout')
@section('title', 'Checkout')
@section('content')
    <h1>Checkout</h1>
    <p>You are purchasing: <strong>{{ $product->name }}</strong></p>
    <p>Price: <strong>${{ $product->price }}</strong></p>
    <form action="{{ route('process_checkout') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="address" required>
        </div>
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
@endsection