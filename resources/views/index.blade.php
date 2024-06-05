<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lapormas</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .header {
            padding-top: 100px;
            margin-bottom: 50px;
        }

        .logo {
            width: 150px;
            margin-bottom: 20px;
        }

        .title {
            font-size: 3rem;
            font-weight: 600;
            color: #b21e1e;
            margin-bottom: 20px;
        }

        .title span {
            animation: bounce 1s infinite alternate;
            display: inline-block;
            /* Menjadikan span menjadi inline-block agar animasi bounce berfungsi dengan baik */
        }

        .description {
            font-size: 1.25rem;
            margin-bottom: 40px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            margin-bottom: 50px;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.25rem;
            font-weight: 600;
            text-transform: uppercase;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #b21e1e;
            color: #fff;
            margin-right: 20px;
        }

        .btn-primary:hover {
            background-color: #991b1b;
        }

        .btn-secondary {
            background-color: transparent;
            color: #b21e1e;
            border: 2px solid #b21e1e;
        }

        .btn-secondary:hover {
            background-color: #b21e1e;
            color: #fff;
        }

        .footer {
            padding: 20px;
            background-color: #b21e1e;
            color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
        }

        /* Animasi bounce */
        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
                /* Tinggi maksimum saat memantul */
            }
        }
    </style>
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
