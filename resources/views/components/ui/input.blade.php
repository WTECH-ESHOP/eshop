@php
$pref = $prefix ?? '';
$id = "$pref$name";
@endphp

<div class="relative flex flex-col gap-1 text-left w-full">
  <label class="text-darkGrey tracking-wide text-xs uppercase" for="{{ $id }}">
    {{ $label }}
    @isset($required) * @endisset
  </label>

  <input id="{{ $id }}"
    {{ $attributes->filter(fn($value, $key) => !in_array($key, ['label', 'prefix'])) }} />
</div>
