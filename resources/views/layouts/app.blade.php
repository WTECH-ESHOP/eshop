<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')

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

  {{-- TODO: <script>
    @if (Session::has('success'))
      const message = "{{ session('success') }}";
      toastr.success(message);
    @endif
  </script> --}}
</body>

</html>
