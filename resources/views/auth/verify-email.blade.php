<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Before continuing, please verify your email address by clicking on the link we emailed to you. If you didn\'t receive the email, we can send you another.') }}
        </div>

        @if (session('message'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <div>
                    <x-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>
            <div>
                <a href="{{ route('index') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('HomePage') }}
                </a>
            </div>
        </div>
    </x-authentication-card>
    <!-- JavaScript for 15-second timer redirect -->
    <script>
        setTimeout(function() {
            window.location.href = "{{ route('index') }}"; // Redirect to the index page after 15 seconds
        }, 15000); // 15,000 milliseconds = 15 seconds
    </script>
</x-guest-layout>