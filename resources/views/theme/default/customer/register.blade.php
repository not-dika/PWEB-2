<x-layout>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 85vh; background: linear-gradient(135deg, #f4f6fc, #eef1f7);">
        <div class="card shadow p-4" style="min-width: 350px; max-width: 400px; width: 100%; border-radius: 20px; border: none;">
            <h3 class="mb-4 text-center" style="color: #333; font-weight: 600;">Buat Akun Baru</h3>

            @if(session('errorMessage'))
                <div class="alert alert-danger">
                    {{ session('errorMessage') }}
                </div>
            @endif

            <form method="POST" action="{{ route('customer.store_register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label text-muted">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-person"></i></span>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                        >
                    </div>
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-muted">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-envelope"></i></span>
                        <input
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            value="{{ old('email') }}"
                            required
                            name="email"
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
                            required
                            name="password"
                        >
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label text-muted">Konfirmasi Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-shield-lock"></i></span>
                        <input
                            type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation"
                            value="{{ old('password_confirmation') }}"
                            required
                            name="password_confirmation"
                        >
                    </div>
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn w-100" style="background: #556ee6; color: #fff; font-weight: 500;">
                    <i class="bi bi-person-plus me-1"></i> Daftar
                </button>
            </form>

            <div class="mt-3 text-center">
                <small class="text-muted">
                    Sudah punya akun?
                    <a href="{{ route('customer.login') }}" style="color: #556ee6; font-weight: 500;">Login disini</a>
                </small>
            </div>
        </div>
    </div>
</x-layout>
