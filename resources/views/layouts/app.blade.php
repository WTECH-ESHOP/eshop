<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>Eshop | @yield('title')</title>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  {{-- Google font Rubik --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

  {{-- Icons --}}
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />

  {{-- Snackbar --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
  <main class="flex flex-col flex-1 flex-grow min-h-screen">
    <x-header />
    <x-nav class="hidden md:block" />

    @yield('top')

    <div class="container flex-grow py-20">
      @yield('content')
    </div>

    <x-footer />
  </main>

  {{-- auth modals --}}
  <x-modals.signin />
  <x-modals.signup />

  @stack('scripts')

  {{-- <script>
    @if (Session::has('success'))
      const message = "{{ session('success') }}";
      toastr.success(message);
    @endif
  </script> --}}
</body>

</html>
