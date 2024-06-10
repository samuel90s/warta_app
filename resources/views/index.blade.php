<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('title', 'welcome') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('template/css/guest.css') }}">
</head>

<body>
    <div class="container">
        <div class="header">
            {{-- <img src="https://unsplash.com/photos/a-white-bullhorn-on-top-of-a-wooden-pole-f6kLn8GplMQ" alt="Lapormas"
                class="logo"> --}}
            <h1 class="title">Selamat Datang </h1>
            <h1 class="title">di Website <span>Lapormas</span></h1>
            <p class="description">Laporkan kejadian-kejadian penting di perumahan Anda dengan mudah melalui aplikasi
                ini.</p>
            <div class="btn-container">
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Daftar</a>
            </div>
        </div>
    </div>

    <footer class="footer">
        Lapormas &copy; {{ date('Y') }}
    </footer>
</body>

</html>
