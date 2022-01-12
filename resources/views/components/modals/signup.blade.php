@extends('components.modal', ['modalId' => 'signup'])

@section('modalTitle')
  Sign up
@overwrite

@section('modalSubtitle')
  Have an account?
@overwrite

@section('modalButton')
  Sign in
@overwrite

@section('modalContent')

  <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-4 w-full">
    @csrf

    <div class="flex gap-4 flex-col md:flex-row">
      <x-ui.input name="first_name" label="first name" type="text" required />
      <x-ui.input name="last_name" label="last name" type="text" required />
    </div>

    @error('first_name')<span class="error">{{ $message }}</span>@enderror
    @error('last_name')<span class="error">{{ $message }}</span>@enderror

    <x-ui.input name="email" label="e-mail address" type="email" required />
    @error('email')<span class="error">{{ $message }}</span>@enderror

    <x-ui.input name="password" label="password" type="password" required />
    @error('password')<span class="error">{{ $message }}</span>@enderror

    <x-ui.input name="password_confirmation" label="password again" type="password" required />
    @error('password_confirmation')<span class="error">{{ $message }}</span>@enderror

    <button id="create-account" type="submit" class="btn-primary mt-6 md:self-center px-16">
      Create account
    </button>
  </form>

  <p class="text-10p md:px-8 leading-4 text-darkGrey -mt-5">
    By creating an account, you acknowledge that you agree to our
    <a class="font-medium" href="#">Terms of Service</a> and
    <a class="font-medium" href="#">Privacy Policy</a>.
  </p>

  @error('signup')
    <script>
      document.getElementById('signup-modal').style.display = 'flex'
    </script>
  @enderror

@overwrite
