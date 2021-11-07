<div class="flex flex-col gap-1 w-full">
  @isset($label)
  <label class="text-darkGrey uppercase text-xs tracking-wide" for={{ $name }}>{{ $label }}</label>
  @endisset

  <select class="border capitalize cursor-pointer" id={{ $name }} name={{ $name }}>
    <option value="one" default>One</option>
    <option value="two">Two</option>
  </select>
</div>