@extends('layouts.admin')

@section('title', 'Admin login')

@section('content')

  <article
    class="relative flex flex-col items-center gap-10 py-12 px-12 md:px-16 text-center bg-white max-w-lg w-full rounded-xl">

    <x-ui.logo />

    <form action="{{ route('admin.login') }}" method="POST" class="flex flex-col gap-4 w-full">
      @csrf

      <x-ui.input prefix="signin-" name="email" label="e-mail address" type="email" required />
      @error('email')<span class="error">{{ $message }}</span>@enderror

      <x-ui.input prefix="signin-" name="password" label="password" type="password" required />
      @error('password')<span class="error">{{ $message }}</span>@enderror

      <div class="flex justify-between gap-3 items-center flex-wrap">
        <x-ui.checkbox name="remember" value="true" label="remember me" />
      </div>
      @error('remember')<span class="error">{{ $message }}</span>@enderror

      <button id="log-in" type="submit" class="btn-primary mt-6 md:self-center px-16">Enter</button>
    </form>
  </article>

@endsection
