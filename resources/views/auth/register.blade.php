<x-guest-layout>
    <div class="auth-card" style="max-width:500px">
        {{-- Logo --}}
        <div class="auth-logo">
            <div class="brand-name">Ads<span>Market</span></div>
            <p class="text-muted small mt-1">Create your free account and start posting ads</p>
        </div>

        <x-validation-errors class="mb-3" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row g-3">
                {{-- Name --}}
                <div class="col-12">
                    <label for="name" class="form-label">Full Name</label>
                    <div class="input-group auth-input-group">
                        <span class="input-group-text"><i class="bi bi-person text-muted"></i></span>
                        <input id="name" type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required autofocus
                               placeholder="Your full name">
                    </div>
                </div>

                {{-- Email --}}
                <div class="col-12">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group auth-input-group">
                        <span class="input-group-text"><i class="bi bi-envelope text-muted"></i></span>
                        <input id="email" type="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required
                               placeholder="you@example.com">
                    </div>
                </div>

                {{-- Phone --}}
                <div class="col-12">
                    <label for="phone_no" class="form-label">Phone Number</label>
                    <div class="input-group auth-input-group">
                        <span class="input-group-text"><i class="bi bi-phone text-muted"></i></span>
                        <input id="phone_no" type="tel" name="phone_no"
                               class="form-control @error('phone_no') is-invalid @enderror"
                               value="{{ old('phone_no') }}" required
                               placeholder="03XX-XXXXXXX">
                    </div>
                </div>

                {{-- Password --}}
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group auth-input-group">
                        <span class="input-group-text"><i class="bi bi-lock text-muted"></i></span>
                        <input id="reg_password" type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               required autocomplete="new-password" placeholder="Min 8 chars">
                        <button type="button" class="pwd-toggle-btn" id="reg_pwd_btn"
                                onclick="togglePwd('reg_password', 'reg_pwd_btn')">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                {{-- Confirm Password --}}
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group auth-input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill text-muted"></i></span>
                        <input id="reg_password_confirm" type="password" name="password_confirmation"
                               class="form-control"
                               required autocomplete="new-password" placeholder="Repeat password">
                        <button type="button" class="pwd-toggle-btn" id="reg_pwd_confirm_btn"
                                onclick="togglePwd('reg_password_confirm', 'reg_pwd_confirm_btn')">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Terms --}}
            <div class="mt-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                    <label class="form-check-label small" for="terms">
                        I agree to the
                        <a href="{{ route('term_services') }}" target="_blank" style="color:var(--primary)">Terms of Service</a>
                        and
                        <a href="{{ route('privacy') }}" target="_blank" style="color:var(--primary)">Privacy Policy</a>
                    </label>
                </div>
            </div>

            {{-- Role (hidden default user) --}}
            <input type="hidden" name="role" value="user">

            <button type="submit" class="btn btn-primary-custom w-100 py-2 fw-bold mt-4">
                <i class="bi bi-person-plus me-2"></i>Create Account
            </button>
        </form>

        <div class="auth-divider"><span>OR</span></div>

        <a href="{{ route('auth.google') }}" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2 py-2 fw-semibold">
            <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.6 9.2l-.1-1.8H9v3.4h4.8C13.6 12 13 13 12 13.6v2.2h3a8.8 8.8 0 0 0 2.6-6.6z" fill="#4285F4"/>
                <path d="M9 18c2.4 0 4.5-.8 6-2.2l-3-2.2a5.4 5.4 0 0 1-8-2.9H1V13a9 9 0 0 0 8 5z" fill="#34A853"/>
                <path d="M4 10.7a5.4 5.4 0 0 1 0-3.4V5H1a9 9 0 0 0 0 8l3-2.3z" fill="#FBBC05"/>
                <path d="M9 3.6c1.3 0 2.5.4 3.4 1.3L15 2.3A9 9 0 0 0 1 5l3 2.4a5.4 5.4 0 0 1 5-3.8z" fill="#EA4335"/>
            </svg>
            Sign up with Google
        </a>

        <p class="text-center text-muted small mt-4 mb-0">
            Already have an account?
            <a href="{{ route('login') }}" class="fw-semibold" style="color:var(--primary)">Sign in</a>
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
