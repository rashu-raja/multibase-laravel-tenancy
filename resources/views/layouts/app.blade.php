<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow-sm py-3 ">
            <div class="container">
                <h2 class="">{{ $header }}</h2>
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main class="flex-fill py-4">
        <div class="container">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer (optional) -->
    <footer class="mt-auto bg-white py-3 border-top">
        <div class="container text-center text-muted small">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
