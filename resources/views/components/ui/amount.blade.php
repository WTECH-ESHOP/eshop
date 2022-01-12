<div class="flex gap-2 items-stretch border border-grey rounded-xl py-1.5 px-2">

  <form action="{{ route('updateInCart', [$key]) }}" method="POST" class="flex items-center">
    @csrf

    <input type="hidden" class="hidden" value="-1" name="amount" />
    <button type="submit" class="flex px-2 w-full items-center h-full">
      <img src={{ asset('assets/icons/minus.svg') }} alt="minus icon">
    </button>
  </form>

  <span class="font-regular">{{ $amount }}</span>

  <form action="{{ route('updateInCart', [$key]) }}" method="POST" class="flex items-center">
    @csrf

    <input type="hidden" class="hidden" value="1" name="amount" />
    <button class="flex px-2 w-full items-center h-full">
      <img src={{ asset('assets/icons/plus.svg') }} alt="plus icon">
    </button>
  </form>
</div>
