<div>
    <nav class="navbar navbar-expand-lg fixed-top p-3 shadow-sm"
        style="background: linear-gradient(90deg, #283e51 0%, #485563 100%);">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="/">Edi Shop</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/categories">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/products">Produk</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    <x-cart-icon></x-cart-icon>

                    @if (auth()->guard('customer')->check())
                        <div class="dropdown ms-3">
                            <a class="btn btn-light text-dark dropdown-toggle btn-sm rounded-pill" href="#"
                                role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::guard('customer')->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded"
                                aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                <li>
                                    <form method="POST" action="{{ route('customer.logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a class="btn btn-sm btn-login ms-3 rounded-pill d-flex align-items-center"
                            href="{{ route('customer.login') }}">
                            <i></i> Login
                        </a>
                        <a class="btn btn-sm btn-login ms-3 rounded-pill d-flex align-items-center"
                            href="{{ route('customer.register') }}">
                            <i></i> Register
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </nav>

    <style>
   /* Brand */
.navbar-brand {
  font-size: 1.4rem;
  letter-spacing: 0.5px;
  font-weight: 600;
}

/* Nav links */
.navbar-nav .nav-link {
  font-size: 1.05rem;
  margin-right: 1rem;
  padding-bottom: 0.2rem;
  color: #fff !important;
  transition: 0.3s;
  border-bottom: 2px solid transparent;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active {
  color: #a7c7e7 !important;
  border-bottom-color: #a7c7e7;
}

/* Buttons (Login/Register) */
.btn-login,
.btn-outline-light {
  font-size: 1rem;
  padding: 0.4rem 1rem;
  border-radius: 50rem;
  transition: 0.3s;
}

.btn-login {
  background-color: #4a6fa5;
  color: #fff;
  border: none;
}

.btn-login:hover {
  background: linear-gradient(90deg, #517ea5, #5b8db8);
  box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

.btn-outline-light {
  border-color: rgba(255, 255, 255, 0.6);
  color: #fff;
}

.btn-outline-light:hover {
  background-color: rgba(255, 255, 255, 0.15);
}

/* Dropdown */
.btn-light {
  background-color: #f8f9fa;
  border: none;
  font-size: 0.95rem;
}

.dropdown-menu {
  font-size: 0.9rem;
}

.dropdown-item:hover {
  background-color: #f1f1f1;
}
    </style>
</div>
