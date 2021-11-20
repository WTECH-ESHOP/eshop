<div class="relative flex flex-col gap-1 text-left w-full">
  <label class="text-darkGrey tracking-wide text-xs uppercase" for={{ $name }}>
    {{ $label }}
    @isset($required) * @endisset
  </label>

  <input id={{ $name }} {{ $attributes->filter(fn($value, $key) => $key != 'label') }} />
</div>
