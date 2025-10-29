<x-guest-layout>
    <div class="card shadow-sm mt-4" style="max-width: 400px; margin:auto;">
        <div class="card-body">
            <h4 class="card-title text-center mb-3">{{ __('Confirm Password') }}</h4>
            <p class="text-muted small text-center mb-4">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" required
                        autocomplete="current-password"
                        class="form-control @error('password') is-invalid @enderror">

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Button -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Confirm') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
