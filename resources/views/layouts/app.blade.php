<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>@yield('title')</title>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet" />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

  <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
  <div id="root">
    @yield('content')
  </div>
</body>

</html>