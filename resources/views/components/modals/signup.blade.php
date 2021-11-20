<form action="{{ route('register') }}" method="POST" class="flex flex-col gap-4 w-full">
  @csrf

  @if (Session::get('success'))
    <div class="text-green-800 w-full">
      {{ Session::get('success') }}
    </div>
  @endif

  @if (Session::get('fail'))
    <div class="text-red-800 w-full">
      {{ Session::get('fail') }}
    </div>
  @endif

  <div class="flex gap-4 flex-col md:flex-row">
    <x-ui.input name="first_name" label="first name" type="text" required />
    <x-ui.input name="last_name" label="last name" type="text" required />
  </div>

  @error('first_name')<span>{{ $message }}</span>@enderror
  @error('last_name')<span>{{ $message }}</span>@enderror

  <x-ui.input name="email" label="e-mail address" type="email" required />
  @error('email')<span>{{ $message }}</span>@enderror

  <x-ui.input name="password" label="password" type="password" required />
  @error('password')<span>{{ $message }}</span>@enderror

  <x-ui.input name="password_confirmation" label="password again" type="password" required />
  @error('password_confirmation')<span>{{ $message }}</span>@enderror

  <button id="create-account" type="submit" class="btn-primary mt-6 md:self-center px-16">
    Create account
  </button>
</form>

<p class="text-10p md:px-8 leading-4 text-darkGrey -mt-5">
  By creating an account, you acknowledge that you agree to our
  <a class="font-medium" href="#">Terms of Service</a> and
  <a class="font-medium" href="#">Privacy Policy</a>.
</p>
