<x-guest-layout>
    <div class="card shadow-sm mt-4" style="max-width: 400px; margin:auto;">
        <div class="card-body">
            <h4 class="card-title text-center mb-3">{{ __('Forgot Password') }}</h4>
            <p class="text-muted small text-center mb-4">
                {{ __('No problem! Enter your email and we’ll send you a link to reset your password.') }}
            </p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success small">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" name="email"
                        value="{{ old('email') }}" required autofocus
                        class="form-control @error('email') is-invalid @enderror">

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
