<form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4 w-full">
  @csrf

  @if (Session::get('fail'))
    <div class="text-red-800 w-full">
      {{ Session::get('fail') }}
    </div>
  @endif

  <x-ui.input prefix="signin-" name="email" label="e-mail address" type="email" required />
  @error('name')<span>{{ $message }}</span>@enderror

  <x-ui.input prefix="signin-" name="password" label="password" type="password" required />
  @error('password')<span>{{ $message }}</span>@enderror

  <div class="flex justify-between gap-3 items-center flex-wrap">
    <x-ui.checkbox name="remember" value="true" label="remember me" />

    <a class="uppercase text-xs whitespace-nowrap text-darkGrey" href="#">forgot your password ?</a>
  </div>
  @error('remember')<span>{{ $message }}</span>@enderror

  <button id="log-in" type="submit" class="btn-primary mt-6 md:self-center px-16">Log in</button>
</form>
