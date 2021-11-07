@if (!isset($noForm))
<form action="/" method="POST" class="flex flex-col gap-4 w-full">
  @csrf
@else
<div class="flex flex-col gap-4 w-full">
@endif
  <div class="flex gap-4">
    <x-ui.input name="first_name" label="first name" type="text" required />
    <x-ui.input name="last_name" label="last name" type="text" required />
  </div>

  @if (isset($noForm))
  <x-ui.input name="email" label="email address" type="text" required />
  @endif
  <x-ui.input name="phone" label="phone number" type="text" required />

  <div class="flex gap-4">
    <x-ui.input name="country" label="country" type="text" required />
    <x-ui.input name="city" label="city" type="text" required />
  </div>

  <x-ui.input name="address" label="address" type="text" required />

  <div class="flex gap-4">
    <x-ui.input name="postal_code" label="Postal code" type="text" required />
    <div class="w-full flex justify-center items-center pt-4">
      @if (!isset($noForm))
      <x-ui.checkbox name="save" label="save permamently" />
      @endif
    </div>
  </div>

@if (!isset($noForm))
  <div class="flex gap-4 justify-center">
    <button class="btn-secondary mt-6 self-center" type="submit">cancel</button>
    <button class="btn-primary mt-6 self-center" type="submit">save</button>
  </div>
</form>
@else 
</div>
@endif
  