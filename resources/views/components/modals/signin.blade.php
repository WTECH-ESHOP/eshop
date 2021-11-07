<form action="/" method="POST" class="flex flex-col gap-4 w-full">
  @csrf

  <x-ui.input name="email" label="e-mail address" type="email" required />

  <x-ui.input name="password" label="password" type="password" required />

  <div class="flex justify-between gap-3 items-center flex-wrap">
    <x-ui.checkbox name="remember" label="remember me" required />

    <a class="uppercase text-xs whitespace-nowrap text-darkGrey" href="#">forgot your password ?</a>
  </div>

  <button class="btn-primary mt-6 md:self-center px-16" type="submit">Log in</button>
</form>