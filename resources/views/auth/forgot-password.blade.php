<x-guest-layout>
    <div class="auth-card">
        <div class="auth-logo">
            <div class="brand-name">Ads<span>Market</span></div>
            <p class="text-muted small mt-1">Enter your email to reset your password</p>
        </div>

        @session('status')
            <div class="alert alert-success-custom mb-3 d-flex gap-2">
                <i class="bi bi-check-circle-fill mt-1"></i>
                <span>{{ $value }}</span>
            </div>
        @endsession

        <x-validation-errors class="mb-3" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                    <input id="email" type="email" name="email"
                           class="form-control border-start-0 @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required autofocus
                           placeholder="you@example.com">
                </div>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 py-2 fw-bold">
                <i class="bi bi-send me-2"></i>Send Reset Link
            </button>
        </form>

        <p class="text-center text-muted small mt-4 mb-0">
            Remembered it?
            <a href="{{ route('login') }}" class="fw-semibold" style="color:var(--primary)">Back to Sign In</a>
        </p>
    </div>
</x-guest-layout>
