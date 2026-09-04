<x-guest-layout>
    <div class="auth-card">
        {{-- Logo --}}
        <div class="auth-logo">
            <div class="brand-name">Ads<span>Market</span></div>
            <p class="text-muted small mt-1">Welcome back — sign in to your account</p>
        </div>

        {{-- Validation Errors --}}
        <x-validation-errors class="mb-3" />

        @session('status')
            <div class="alert alert-success-custom mb-3">{{ $value }}</div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group auth-input-group">
                    <span class="input-group-text">
                        <i class="bi bi-envelope text-muted"></i>
                    </span>
                    <input id="email" type="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required autofocus autocomplete="username"
                           placeholder="you@example.com">
                </div>
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group auth-input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock text-muted"></i>
                    </span>
                    <input id="login_password" type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           required autocomplete="current-password" placeholder="••••••••">
                    <button type="button" class="pwd-toggle-btn" id="login_pwd_btn"
                            onclick="togglePwd('login_password', 'login_pwd_btn')">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>

            {{-- Remember + Forgot --}}
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                    <label class="form-check-label small" for="remember_me">Remember me</label>
                </div>
                @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="small" style="color:var(--secondary)">Forgot password?</a>
                @endif
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn btn-primary-custom w-100 py-2 fw-bold">
                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
            </button>
        </form>

        <div class="auth-divider"><span>OR</span></div>

        {{-- Google Login --}}
        <a href="{{ route('auth.google') }}" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2 py-2 fw-semibold">
            <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.6 9.2l-.1-1.8H9v3.4h4.8C13.6 12 13 13 12 13.6v2.2h3a8.8 8.8 0 0 0 2.6-6.6z" fill="#4285F4"/>
                <path d="M9 18c2.4 0 4.5-.8 6-2.2l-3-2.2a5.4 5.4 0 0 1-8-2.9H1V13a9 9 0 0 0 8 5z" fill="#34A853"/>
                <path d="M4 10.7a5.4 5.4 0 0 1 0-3.4V5H1a9 9 0 0 0 0 8l3-2.3z" fill="#FBBC05"/>
                <path d="M9 3.6c1.3 0 2.5.4 3.4 1.3L15 2.3A9 9 0 0 0 1 5l3 2.4a5.4 5.4 0 0 1 5-3.8z" fill="#EA4335"/>
            </svg>
            Continue with Google
        </a>

        <p class="text-center text-muted small mt-4 mb-0">
            Don't have an account?
            <a href="{{ route('register') }}" class="fw-semibold" style="color:var(--primary)">Create one free</a>
        </p>
    </div>

    <script>
    function togglePwd(inputId, btnId) {
        var input = document.getElementById(inputId);
        var btn   = document.getElementById(btnId);
        var icon  = btn.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'bi bi-eye-slash';
        } else {
            input.type = 'password';
            icon.className = 'bi bi-eye';
        }
    }
    </script>
</x-guest-layout>
