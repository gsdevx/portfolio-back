<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Полина Иванова | @yield('title')</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="d-flex flex-column min-vh-100">
    @include('partials/header')

    <div class="flex-grow-1 mb-5">
        <div class="container">
            @yield('content')
        </div>
    </div>

    @include('partials/footer')
</div>
</body>
</html>
