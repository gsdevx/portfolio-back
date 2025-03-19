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

@auth
    @include('partials.panel')
@endauth

@if(!$generalSettings->siteEnabled)
    <div class="mt-5 d-flex justify-content-center">
        <h1>Сайт временно не доступен</h1>
    </div>
@else
    <div x-data="{ headerFixed: false }" class="d-flex flex-column min-vh-100">
        @include('partials/header')

        <div @scroll.window="headerFixed = window.pageYOffset > 135" class="flex-grow-1 mb-5">
            <div :class="headerFixed ? 'mt-100' : ''" class="container">
                @yield('content')
            </div>
        </div>

        @include('partials/footer')
    </div>
@endif

</body>
</html>
