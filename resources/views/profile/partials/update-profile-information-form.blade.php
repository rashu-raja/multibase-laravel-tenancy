<section class="mb-4">
    <header class="mb-3">
        <h2 class="h5 fw-bold">
            {{ __('Profile Information') }}
        </h2>
        <p class="text-muted small">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Hidden form for email verification -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
            <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="small text-dark mb-1">
                    {{ __('Your email address is unverified.') }}
                    <button form="send-verification" class="btn btn-link btn-sm p-0">{{ __('Click here to re-send the verification email.') }}</button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="small text-success mt-1">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-2">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
            <span class="text-muted small" id="profileSavedMessage">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>

<!-- Optional JS to auto-hide the "Saved" message -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const msg = document.getElementById('profileSavedMessage');
        if (msg) {
            setTimeout(() => msg.style.display = 'none', 2000);
        }
    });
</script>