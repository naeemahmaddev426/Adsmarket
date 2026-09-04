<x-guest-layout>
    <div class="auth-card">
        <div class="auth-logo">
            <div class="brand-name">Ads<span>Market</span></div>
            <p class="text-muted small mt-1">Set your new password</p>
        </div>

        <x-validation-errors class="mb-3" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                    <input id="email" type="email" name="email" class="form-control border-start-0"
                           value="{{ old('email', $request->email) }}" required autofocus
                           placeholder="your@email.com">
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                    <input id="password" type="password" name="password" class="form-control border-start-0"
                           required autocomplete="new-password" placeholder="Min 8 characters">
                    <button type="button" class="input-group-text bg-light" onclick="togglePwd('password', this)">
                        <i class="bi bi-eye text-muted"></i>
                    </button>
                </div>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock-fill text-muted"></i></span>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           class="form-control border-start-0" required autocomplete="new-password"
                           placeholder="Repeat password">
                </div>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 py-2 fw-bold">
                <i class="bi bi-key me-2"></i>Reset Password
            </button>
        </form>

        <p class="text-center text-muted small mt-4 mb-0">
            <a href="{{ route('login') }}" class="fw-semibold" style="color:var(--primary)">Back to Sign In</a>
        </p>
    </div>
</x-guest-layout>

@push('scripts')
<script>
function togglePwd(id, btn) {
    const input = document.getElementById(id);
    const icon  = btn.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}
</script>
@endpush
