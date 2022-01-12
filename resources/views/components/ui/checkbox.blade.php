<div class="flex gap-2">
  <input id="{{ strtolower($value) ?? strtolower($name) }}" type="checkbox" {{ $attributes }}
    {{ in_array($value, explode(',', request($param ?? ''))) ? 'checked' : '' }} />

  <label for="{{ strtolower($value) ?? strtolower($name) }}"
    class="uppercase text-xs whitespace-nowrap text-darkGrey cursor-pointer select-none w-full">
    {{ $label }}
  </label>
</div>
