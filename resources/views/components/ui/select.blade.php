<div class="flex flex-col gap-1 w-full text-left">
  @isset($label)
    <label class="text-darkGrey uppercase text-xs tracking-wide" for={{ $name }}>{{ $label }}</label>
  @endisset

  <select id={{ $name }} name={{ $name }}
    class="border capitalize cursor-pointer {{ isset($small) ? 'py-1.5 px-2' : '' }}">
    <option value="one" default>One</option>
    <option value="two">Two</option>
  </select>
</div>
