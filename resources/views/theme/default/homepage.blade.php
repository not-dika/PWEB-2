<x-layout>
    <x-slot name="title"> Beranda</x-slot>
    <div class="container">
        <section>
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">
                        Temukan Teknologi
                        <span class="text-gradient">Terdepan</span>
                        untuk Anda
                    </h1>
                    <p class="hero-subtitle">
                        Jelajahi koleksi komputer, komponen, dan aksesoris teknologi terbaik dengan harga kompetitif dan
                        kualitas premium yang terjamin.
                    </p>
                    <div class="hero-buttons">
                        <a href="/products" class="btn btn-hero-primary btn-lg rounded-pill me-3">
                            <i class="bi bi-cart3 me-2"></i>
                            Belanja Sekarang
                        </a>
                        <a href="/categories" class="btn btn-hero-outline btn-lg rounded-pill">
                            <i class="bi bi-grid me-2"></i>
                            Lihat Kategori
                        </a>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="hero-image-container">
                        <div class="hero-image-wrapper">
                            <img src="{{ asset('images/herosection.jpeg') }}" alt="Hero Image" class="hero-image">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- Features Section -->
    <section class="features-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h5>Pengiriman Gratis</h5>
                        <p>Gratis ongkir untuk pembelian di atas Rp 1.000.000</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h5>Garansi Resmi</h5>
                        <p>Semua produk bergaransi resmi dari distributor</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h5>Support 24/7</h5>
                        <p>Tim customer service siap membantu Anda kapan saja</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h5>Kualitas Terbaik</h5>
                        <p>Produk berkualitas tinggi dengan harga terjangkau</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Section -->
    <section id="categories" class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="section-title mb-0">Kategori Produk</h2>
                <a href="{{ URL::to('/categories') }}" class="btn btn-hero-outline rounded-pill">Lihat Semua
                    Kategori</a>
            </div>

            <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 g-3">
                @foreach ($categories as $category)
                    <div class="col">
                        <a href="{{ URL::to('/category/' . $category->slug) }}" class="text-decoration-none">
                            <div class="category-card h-100 text-center">
                                <div class="category-image mb-3">
                                    <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/150?text=No+Image' }}"
                                        alt="{{ $category->name }}">
                                </div>
                                <h6 class="category-title mb-2">{{ $category->name }}</h6>
                                <p class="category-desc small text-muted">{{ $category->description }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="section-title">Produk Kami</h3>
            <a href="{{ URL::to('/products') }}" class="btn btn-hero-outline rounded-pill">Lihat Semua Produk</a>
        </div>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            @forelse($products->where('is_active', true) as $product)
                <div class="col">
                    <div class="card product-card h-100">
                        <div class="product-img-wrapper">
                            <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : 'https://via.placeholder.com/350x200?text=No+Image' }}"
                                class="card-img-top" alt="{{ $product->name }}">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted text-truncate">{{ $product->description }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="price-tag">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-detail">Lihat
                                    Detail</a>
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

</x-layout>

<style>
    /* Hero Section */
    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 1.5rem;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        margin-bottom: 2rem;
        max-width: 500px;
    }

    .btn-hero-primary {
        background: #4a6fa5;
        color: #fff;
        border: none;
    }

    .btn-hero-primary:hover {
        background: linear-gradient(90deg, #517ea5, #5b8db8);
        color: #fff;
    }

    .btn-hero-outline {
        background: transparent;
        color: #4a6fa5;
        border: 2px solid #4a6fa5;
    }

    .btn-hero-outline:hover {
        background: #4a6fa5;
        color: #fff;
    }

    .hero-image {
        max-width: 100%;
        height: auto;
        border-radius: 20px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .hero-image {
            margin-top: 2rem;
        }
    }

    /* Features Section */
    .features-section {
        background: #f8f9fa;
    }

    .feature-card {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, #6a7ac3 0%, #1f1c22 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
    }

    /* Kategori Section */
    .category-card {
        border: none;
        border-radius: 0.75rem;
        background-color: #ffffff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        padding: 1rem 0.75rem;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .category-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .category-image {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background-color: #f0f4f8;
        overflow: hidden;
        margin: 0 auto 0.5rem auto;
    }

    .category-image img {
        width: 90%;
        height: 90%;
        object-fit: contain;
    }

    .category-title {
        font-size: 0.95rem;
        font-weight: 600;
        color: #2c3e50;
        margin: 0.25rem 0;
    }

    /* Card styling */
    .product-card {
        border: none;
        border-radius: 0.75rem;
        background-color: #ffffff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
    }

    /* Image wrapper to fix height */
    .product-img-wrapper {
        height: 220px;
        overflow: hidden;
        border-top-left-radius: 0.75rem;
        border-top-right-radius: 0.75rem;
        background-color: #f0f4f8;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: scale-down;
    }

    /* Product content */
    .card-title {
        font-size: 1.05rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .card-text {
        font-size: 0.9rem;
        color: #6c757d;
    }

    /* Price styling */
    .price-tag {
        font-weight: 600;
        font-size: 1rem;
        color: #2a2c34;
    }

    /* Detail button styling */
    .btn-detail {
        background-color: #4a6fa5;
        color: #ffffff;
        padding: 0.35rem 0.9rem;
        font-size: 0.9rem;
        border-radius: 50rem;
        transition: background 0.3s, box-shadow 0.3s;
        text-decoration: none;
    }

    .btn-detail:hover {
        background: linear-gradient(90deg, #517ea5, #5b8db8);
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        text-decoration: none;
    }
</style>
