<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom mt-2">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            Welcome
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold text-primary' : '' }}"
                        href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile.edit') ? 'active fw-bold text-primary' : '' }}"
                        href="{{ route('profile.edit') }}">
                        Profile
                    </a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm ms-2">
                            Logout
                        </button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="btn btn-outline-primary btn-sm me-2" href="{{ route('login') }}">
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm" href="{{ route('register') }}">
                        Register
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>