<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.meta')
    <title>@yield('title') | Lapormas</title>

    {{-- favicon --}}
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut-icon" type="image/x-icon" href="">

    @stack('before-style')
    {{-- style  --}}
    @include('includes.style')

    @stack('after-style')
</head>

<body>
    @include('includes.header')
    @yield('content')
    @include('includes.footer')

    @stack('before-script')
    {{-- sripts  --}}
    @include('includes.script')
    @stack('after-script')
</body>

</html>
