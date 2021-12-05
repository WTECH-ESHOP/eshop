<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')

<body>
  <main class="flex flex-col flex-1 flex-grow min-h-screen">
    <x-header />
    <x-nav />

    @yield('top')

    <div class="container flex-grow py-10 md:py-20">
      @yield('content')
    </div>

    <x-footer />
  </main>

  {{-- auth modals --}}
  <x-modals.signin />
  <x-modals.signup />

  @stack('scripts')
</body>

</html>
