<form action="/" method="POST" class="flex flex-col gap-4 w-full">
  @csrf

  <div class="flex gap-4">
    <x-ui.input name="first_name" label="first name" type="text" required />
    <x-ui.input name="last_name" label="last name" type="text" required />
  </div>

  <x-ui.input name="email" label="e-mail address" type="email" required />

  <x-ui.input name="password" label="password" type="password" required />

  <x-ui.input name="confirm" label="password again" type="password" required />

  <button class="btn-primary mt-6 self-center px-16" type="submit">Create account</button>
</form>

<p class="text-10p px-8 leading-4 text-darkGrey -mt-5">
  By creating an account, you acknowledge that you agree to our
  <a class="font-medium" href="#">Terms of Service</a> and
  <a class="font-medium" href="#">Privacy Policy</a>.
</p>