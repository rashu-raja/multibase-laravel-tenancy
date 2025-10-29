<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional custom styling -->
    <style>
        body {
            background-color:rgb(238, 242, 247);
        }
        .auth-container {
            max-width: 420px;
            margin-top: 80px;
        }
        .auth-logo img {
            width: 80px;
            height: 80px;
            opacity: 0.8;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 justify-content-center align-items-center">

    <div class="text-center auth-logo mb-3">
        <a href="/">
            <x-application-logo class="img-fluid" />
        </a>
    </div>

    <div class="card shadow-sm auth-container w-100">
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
