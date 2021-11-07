<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>@yield('title')</title>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

  <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
  <main class="flex flex-col flex-1 flex-grow min-h-screen">
    <x-header />
    <x-nav />

    {{--
    <x-cart.popup /> --}}

    @yield('top')

    <div class="container flex-grow py-20">
      @yield('content')
    </div>

    <x-footer />
  </main>
</body>

</html>