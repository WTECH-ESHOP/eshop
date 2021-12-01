@php
isset($stage) ? ($stage = $stage) : ($stage = null);
@endphp

<div class="bg-grey flex flex-col items-center pt-10 pb-20 md:pb-14">
  <div class="w-3/4 md:w-2/5">
    <div class="flex w-full items-center">

      {{-- cart --}}
      <a href="{{ route('cart') }}" class="relative">
        <div
          class="border-darkGrey {{ $stage >= 1 ? 'bg-black' : 'border-3 border-black' }} w-24p h-24p rounded-1/2 flex justify-center items-center">

          @if ($stage >= 1)
            <img src="{{ asset('assets/icons/done.svg') }}" alt="done">
          @endif
        </div>

        <span
          class="absolute -bottom-2 left-1/2 transform translate-y-full -translate-x-1/2 uppercase font-semibold md:whitespace-nowrap text-center">
          cart
        </span>
      </a>

      <div class="{{ $stage >= 1 ? 'bg-black' : 'bg-darkGrey' }} flex-grow w-auto h-3p"></div>

      {{-- delivery and payment --}}
      <a href="{{ route('cart') }}" class="relative">
        <div
          class="{{ $stage == 1 ? 'border-black' : 'border-darkGrey' }}  {{ $stage >= 2 ? 'bg-black' : 'border-3' }}  w-24p h-24p rounded-1/2 flex justify-center items-center">

          @if ($stage >= 2)
            <img src="{{ asset('assets/icons/done.svg') }}" alt="done">
          @endif
        </div>

        <span
          class="absolute -bottom-2 left-1/2 transform translate-y-full -translate-x-1/2 uppercase font-semibold md:whitespace-nowrap text-center">
          delivery & payment
        </span>
      </a>

      <div class="{{ $stage > 2 ? 'bg-black' : 'bg-darkGrey' }} flex-grow w-auto h-3p"></div>

      {{-- confirmation --}}
      <a href="{{ route('cart') }}" class="relative">
        <div
          class="border-darkGrey {{ $stage >= 3 ? 'bg-black' : 'border-3 border-black' }} w-24p h-24p rounded-1/2 flex justify-center items-center">

          @if ($stage >= 3)
            <img src="{{ asset('assets/icons/done.svg') }}" alt="done">
          @endif
        </div>

        <span
          class="md:hidden absolute -bottom-2 left-1/2 transform translate-y-full -translate-x-1/2 uppercase font-semibold md:whitespace-nowrap text-center">
          check
        </span>

        <span
          class="hidden md:block absolute -bottom-2 left-1/2 transform translate-y-full -translate-x-1/2 uppercase font-semibold md:whitespace-nowrap text-center">
          confirmation
        </span>
      </a>
    </div>
  </div>
</div>
