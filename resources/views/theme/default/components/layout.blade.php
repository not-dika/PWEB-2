<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Edi Shop - Komputer & Komponen' }}</title>

    <meta name="description" content="Edi Shop adalah toko online terpercaya untuk membeli komputer, CPU, GPU, monitor, dan aksesoris komputer dengan harga terbaik.">
    <meta name="keywords" content="komputer, GPU, CPU, monitor, toko online, e-commerce">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{ $style ?? '' }}

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f6f8;
            color: #333;
            padding-top: 70px;
        }
        main {
            background-color: #f5f6f8;
            min-height: 80vh;
        }
        .container-fluid {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .content-section {
            padding: 2rem 0;
        }

        /* Footer Styling */
        footer {
            background: linear-gradient(90deg, #2c3e50, #34495e);
            color: #d1d5db;
        }
        footer a {
            color: #d1d5db;
            text-decoration: none;
        }
        footer a:hover {
            color: #ffffff;
        }
        footer h5, footer h6 {
            color: #ffffff;
        }
        .footer-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
        .social-icons a {
            color: #d1d5db;
            margin-right: 0.5rem;
            font-size: 1.2rem;
        }
        .social-icons a:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Slot untuk Komponen Navbar -->
    <x-navbar themeFolder="{{ $themeFolder }}"></x-navbar>

    <!-- Konten Halaman -->
    <main>
        <div class="container-fluid">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="pt-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5 class="mb-3">Tentang Edi Shop</h5>
                    <p class="small">
                        Edi Shop adalah toko online yang menyediakan berbagai produk komputer dan komponen berkualitas seperti CPU, GPU, Monitor, dan Aksesoris. Belanja mudah, cepat, dan aman dengan harga terbaik.
                    </p>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="mb-3">Navigasi</h6>
                    <ul class="list-unstyled small">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/products">Produk</a></li>
                        <li><a href="/categories">Kategori</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="mb-3">Kontak Kami</h6>
                    <ul class="list-unstyled small">
                        <li><i class="bi bi-envelope me-2"></i> contact@edishop.xyz</li>
                        <li><i class="bi bi-telephone me-2"></i> +62 8123 4567 8910</li>
                        <li><i class="bi bi-geo-alt me-2"></i> Tegal, Indonesia</li>
                    </ul>
                    <div class="social-icons mt-2">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="text-center pb-3 small">
                © {{ date('Y') }} Edi Shop LLC. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
