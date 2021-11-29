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
  <script src="{{ asset('js/app.js') }}"></script>
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

  <x-ui.modal id="signin-modal" title="Sign In" subtitle="Don’t have an account? ">
    <x-slot name="button">
      <span id="signin-button" class="cursor-pointer font-medium">Sign up</span>
    </x-slot>

    <x-modals.signin />
  </x-ui.modal>

  <x-ui.modal id="signup-modal" title="Sign Up" subtitle="Have an account? ">
    <x-slot name="button">
      <span id="signup-button" class="cursor-pointer font-medium">Sign in</span>
    </x-slot>

    <x-modals.signup />
  </x-ui.modal>

  <script>
    const signinModal = document.getElementById('signin-modal')
    const signupModal = document.getElementById('signup-modal')

    const signinButton = document.getElementById('signin-button')
    const signupButton = document.getElementById('signup-button')

    const closeSigninModal = document.getElementById('close-signin-modal')
    const closeSignupModal = document.getElementById('close-signup-modal')

    closeSigninModal.addEventListener('click', () => {
      signinModal.style.display = 'none'
    })

    closeSignupModal.addEventListener('click', () => {
      signupModal.style.display = 'none'
    })

    signinButton.addEventListener('click', () => {
      signinModal.style.display = 'none'
      signupModal.style.display = 'flex'
    })

    signupButton.addEventListener('click', () => {
      signinModal.style.display = 'flex'
      signupModal.style.display = 'none'
    })
  </script>

  @stack('scripts')

  <script>
    @if (Session::has('message'))
      toastr.options =
      {
      "closeButton" : true,
      "progressBar" : true
      }
      toastr.success("{{ session('message') }}");
    @endif
  </script>
</body>

</html>

{{-- TODO:
  - search
  - modals
  - autentifikacia (spravy)
  - kosik (prihlaseny user) --}}
