<x-layout>
    <x-slot name="title">Products</x-slot>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 style="font-size: 1.5rem; color: #2c3e50;">
                <i class="bi bi-box-seam me-2"></i>Produk Kami
            </h3>
            <form action="{{ url()->current() }}" method="GET" class="d-flex" style="max-width: 300px;">
                <input
                    type="text"
                    name="search"
                    class="form-control me-2 border-primary"
                    placeholder="Cari produk..."
                    value="{{ request('search') }}"
                    style="border-radius: 8px;"
                >
                <button type="submit" class="btn btn-primary" style="border-radius: 8px;">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <div class="row">
            @forelse($products->where('is_active', true) as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 15px;">
                        <img
                            src="{{ $product->image_url ? asset('storage/' . $product->image_url) : 'https://via.placeholder.com/350x200?text=No+Image' }}"
                            class="card-img-top"
                            alt="{{ $product->name }}"
                            style="border-top-left-radius: 15px; border-top-right-radius: 15px; height: 180px; object-fit: cover;"
                        >
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title" style="color: #34495e;">{{ $product->name }}</h5>
                            <p class="card-text text-truncate" style="font-size: 0.9rem; color: #7f8c8d;">
                                {{ $product->description }}
                            </p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-dark">
                                    <i class="bi bi-tags"></i> Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                                <a
                                    href="{{ route('product.show', $product->slug) }}"
                                    class="btn btn-outline-primary btn-sm"
                                    style="border-radius: 8px;"
                                >
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-info">Belum ada produk pada kategori ini.</div>
                </div>
            @endforelse

            <div class="d-flex justify-content-center w-100 mt-4">
                {{ $products->links('vendor.pagination.simple-bootstrap-5') }}
            </div>
        </div>
    </div>

    {{-- Hover style tambahan --}}
    <style>
        .product-card:hover {
            transform: scale(1.02);
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
        }
    </style>
</x-layout>
