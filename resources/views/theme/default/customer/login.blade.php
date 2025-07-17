<x-layout>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 85vh; background: linear-gradient(135deg, #f4f6fc, #eef1f7);">
        <div class="card shadow p-4" style="min-width: 350px; max-width: 400px; width: 100%; border-radius: 20px; border: none;">
            <h3 class="mb-4 text-center" style="color: #333; font-weight: 600;">Masuk ke Akun Anda</h3>

            @if(session('errorMessage'))
                <div class="alert alert-danger">
                    {{ session('errorMessage') }}
                </div>
            @endif

            @if(session('successMessage'))
                <div class="alert alert-success">
                    {{ session('successMessage') }}
                </div>
            @endif

            <form method="POST" action="{{ route('customer.login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label text-muted">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-envelope"></i></span>
                        <input
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                        >
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-muted">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                        <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            name="password"
                            required
                        >
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label text-muted" for="remember">Ingat Saya</label>
                </div>

                <button type="submit" class="btn w-100" style="background: #556ee6; color: #fff; font-weight: 500; transition: 0.3s;">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>

                <div class="mt-3 text-center">
                    <small class="text-muted">
                        Belum punya akun?
                        <a href="{{ route('customer.register') }}" style="color: #556ee6; font-weight: 500;">Daftar disini</a>
                    </small>
                </div>
            </form>
        </div>
    </div>
</x-layout>
