<x-app-layout>
    <div class="container py-5">

        <!-- Header -->
        <div class="mb-4">
            <h2 class="fw-bold">
                {{ __('Profile') }}
            </h2>
        </div>

        <!-- Update Profile Information -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Update Password -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Delete User -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</x-app-layout>