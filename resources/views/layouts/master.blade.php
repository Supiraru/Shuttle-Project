<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Shuttle</title>

          <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gray-200" style="background-image: url('/images/cloudy-flip.svg'); background-position: center center; background-repeat: no-repeat; background-attachment: fixed;background-size: cover;">
        @include('layouts.components.nav')
        @yield('content')
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        @stack('scripts')
    </body>
</html>
