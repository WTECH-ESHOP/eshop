@if (!isset($noForm))
  @extends('components.modal', ['modalId' => 'address'])

  @section('modalTitle')
    Address
  @overwrite

  @section('modalContent')
    <form action="{{ route('cart.address') }}" method="POST" class="flex flex-col gap-4 w-full">
      @csrf
    @else
      <div class="flex flex-col gap-4 w-full">
  @endif

  <div class="flex gap-4 flex-col md:flex-row">
    <x-ui.input prefix="address-" name="first_name" label="first name" type="text" required />
    @error('first_name')<span class="error">{{ $message }}</span>@enderror

    <x-ui.input prefix="address-" name="last_name" label="last name" type="text" required />
    @error('last_name')<span class="error">{{ $message }}</span>@enderror
  </div>

  @if (isset($noForm))
    <x-ui.input prefix="address-" name="email" label="email address" type="text" required />
    @error('email')<span class="error">{{ $message }}</span>@enderror
  @endif

  <x-ui.input prefix="address-" name="phone_number" label="phone number" type="text" required />
  @error('phone_number')<span class="error">{{ $message }}</span>@enderror

  <div class="flex gap-4 flex-col md:flex-row">
    <x-ui.input prefix="address-" name="country" label="country" type="text" required />
    @error('country')<span class="error">{{ $message }}</span>@enderror

    <x-ui.input prefix="address-" name="city" label="city" type="text" required />
    @error('city')<span class="error">{{ $message }}</span>@enderror
  </div>

  <x-ui.input prefix="address-" name="street" label="address" type="text" required />
  @error('street')<span class="error">{{ $message }}</span>@enderror

  <div class="flex gap-4 flex-col md:flex-row">
    <x-ui.input prefix="address-" name="postal_code" label="Postal code" type="text" required />
    @error('postal_code')<span class="error">{{ $message }}</span>@enderror

    <div class="w-full flex justify-start md:justify-center items-center pt-4">
      @if (!isset($noForm))
        <x-ui.checkbox name="save" value="save" label="save permamently" />
      @endif
    </div>
  </div>

  @if (!isset($noForm))
    <div class="flex gap-4 justify-center">
      <button id="close-address" class="btn-secondary mt-6 w-1/2 md:w-auto md:self-center">cancel</button>
      <button type="submit" class="btn-primary mt-6 w-1/2 md:w-auto md:self-center">save</button>
    </div>
    </form>

    @error('address')
      <script>
        document.getElementById('address-modal').style.display = 'flex'
      </script>
    @enderror
  @overwrite
@else
  </div>
@endif
