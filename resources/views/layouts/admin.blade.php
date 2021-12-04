<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')

<body>
  <main class="flex flex-col min-h-screen bg-gray-100">
    @yield('content')
  </main>

  @stack('scripts')
</body>

</html>
