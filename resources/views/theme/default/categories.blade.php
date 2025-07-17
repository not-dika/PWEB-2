<x-layout>
    <x-slot name="title">Categories</x-slot>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 style="font-weight: 600; color: #333;">
                <i class="bi bi-grid me-2" style="color: #555;"></i>
                Kategori Produk
            </h3>
        </div>


        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($categories as $category)
                <div class="col">
                    <a href="{{ url('/category/' . $category->slug) }}" class="text-decoration-none">
                        <div class="card text-center h-100 shadow-sm border-0" style="transition: transform 0.2s;">
                            <div class="card-body py-4">
                                <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                    style="width: 70px; height: 70px; background-color: #f0f0f0;">
                                    <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/100x100?text=No+Image' }}"
                                        alt="{{ $category->name }}"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                                </div>
                                <h6 class="card-title text-dark mb-1">{{ $category->name }}</h6>
                                <p class="text-muted small mb-0 text-truncate">{{ $category->description }}</p>
                                <span class="text-primary small" style="font-weight: 500;">Lihat Produk →</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $categories->links('vendor.pagination.simple-bootstrap-5') }}
        </div>
    </div>
</x-layout>


<style>
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }
</style>
