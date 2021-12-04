<section id="delivery" class="max-w-2xl mx-auto text-xs mb-12 border-t border-grey">

  @foreach ($shippings as $key => $shipping)
    <input class="hidden" type="radio" id="{{ $shipping->id }}" name="shipping" value="{{ $shipping->id }}"
      {{ $loop->index == 0 ? 'checked' : '' }}>

    <label for="{{ $shipping->id }}" class="flex justify-between p-5 border-b border-grey uppercase">
      <div class="flex items-center gap-2">
        <div class="selecteds w-3 h-3 bg-grey rounded-1/2"></div>
        <span for="gls">{{ $shipping->name }}</span>
      </div>

      <span class="text-darkGrey">Monday, 24.12.2021</span>
      <span class="font-medium">{{ $shipping->price ? number_format($shipping->price, 2) . ' €' : 'free' }}</span>
    </label>
  @endforeach

</section>
