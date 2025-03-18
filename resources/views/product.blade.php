@extends('layout')
@section('title', $product->name)
@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p><strong>Price: </strong>${{ $product->price }}</p>
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit" class="btn btn-success">Buy Now</button>
    </form>
@endsection