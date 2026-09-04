<x-guest-layout>
    <div class="auth-card text-center">
        <div class="auth-logo mb-3">
            <div class="brand-name">Ads<span>Market</span></div>
        </div>

        <div class="mb-4">
            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                 style="width:72px;height:72px;background:rgba(244,129,15,.1)">
                <i class="bi bi-envelope-check" style="font-size:2rem;color:var(--accent)"></i>
            </div>
            <h5 class="fw-bold text-primary-custom">Verify Your Email</h5>
            <p class="text-muted small">
                Thanks for signing up! Before getting started, please verify your email address by clicking the link we just sent.
                If you didn't receive the email, click the button below to request another.
            </p>
        </div>

        @if(session('status') === 'verification-link-sent')
        <div class="alert alert-success-custom mb-3 text-start">
            <i class="bi bi-check-circle-fill me-2"></i>
            A new verification link has been sent to your email address.
        </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary-custom w-100 py-2 fw-bold mb-3">
                <i class="bi bi-send me-2"></i>Resend Verification Email
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary w-100 py-2">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </button>
        </form>
    </div>
</x-guest-layout>
