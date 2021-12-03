<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')

<body>
  <main class="flex flex-col min-h-screen">
    @yield('content')
  </main>

  @stack('scripts')
</body>

</html>
