@extends('layout')
@section('title', 'Catalog')
@section('content')
    <h1>Product Catalog</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }}</p>
                        <a href="{{ route('product', $product->id) }}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection