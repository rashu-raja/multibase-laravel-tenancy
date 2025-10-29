<x-guest-layout>
    <div class="card shadow-sm mt-4" style="max-width: 550px; margin:auto;">
        <div class="card-body text-center">
            <h4 class="card-title mb-3">{{ __('Verify Your Email Address') }}</h4>
            <p class="text-muted mb-4">
                {{ __('Thanks for signing up! Please verify your email by clicking the link we just sent you.') }}
            </p>

            @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success small">
                {{ __('A new verification link has been sent to your email address.') }}
            </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mt-4">
                <!-- Resend Verification Email -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>