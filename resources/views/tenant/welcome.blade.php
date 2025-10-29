<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Main Content -->
    <div class="container text-center my-5">
        <h1 class="mb-4">Welcome to Multi-Base Laravel-Tenancy!</h1>
        <p class="lead mb-4">Here are some helpful links to get you started:</p>

        <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mb-4">
            <a href="https://tenancyforlaravel.com/docs/v3/quickstart" class="btn btn-outline-danger">Documentation</a>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm d-flex justify-content-center gap-5">
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            @endif
            @endauth
            @endif
        </nav>
    </div>

    <!-- Footer -->
    <footer class="mt-auto py-3 bg-white shadow-sm">
        <div class="container text-center text-muted">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>