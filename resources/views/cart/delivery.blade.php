@extends('layouts.app')

@section('title', 'Delivery')

@section('top')
  <x-cart.state stage="2" />
@endsection

@section('content')

  <x-modals.address />

  <form class="mx-auto" action="{{ route('cart.delivery') }}" method="POST">
    @csrf

    <section class="max-w-2xl mx-auto font-medium mb-12">
      <article class="grid md:grid-cols-3 gap-5">

        @foreach ($addresses as $address)
          <input class="hidden" type="radio" id="{{ 'address' . $address->id }}" name="address"
            value="{{ $address->id }}" {{ $loop->index == 0 ? 'checked' : '' }}>

          <label for="{{ 'address' . $address->id }}"
            class="border border-grey rounded-xl p-8 pb-16 flex flex-col gap-5 relative overflow-hidden cursor-pointer">

            <div class="flex flex-col gap-1">
              <span>{{ $address->first_name }} {{ $address->last_name }}</span>
              <span>{{ $address->phone_number }}</span>
            </div>

            <p class="font-normal leading-6">
              {{ $address->street }}<br>
              {{ $address->city }}, {{ $address->postal_code }}<br>
              {{ $address->country }}
            </p>

            <button
              class="absolute border-grey border-t border-l bottom-0 right-0 px-8 flex items-center h-10 rounded-tl-xl">
              <span>SELECT</span>
              <img class="h-3 hidden" src="{{ asset('assets/icons/done.svg') }}" alt="done">
            </button>
          </label>
        @endforeach

        @if ($addr)
          <input class="hidden" type="radio" id="session" name="address" value="session">

          <label for="session"
            class="border border-grey rounded-xl p-8 pb-16 flex flex-col gap-5 relative overflow-hidden cursor-pointer">

            <div class="flex flex-col gap-1">
              <span>{{ $addr['first_name'] }} {{ $addr['last_name'] }}</span>
              <span>{{ $addr['phone_number'] }}</span>
            </div>

            <p class="font-normal leading-6">
              {{ $addr['street'] }}<br>
              {{ $addr['city'] }}, {{ $addr['postal_code'] }}<br>
              {{ $addr['country'] }}
            </p>

            <button
              class="absolute border-grey border-t border-l bottom-0 right-0 px-8 flex items-center h-10 rounded-tl-xl">
              <span>SELECT</span>
              <img class="h-3 hidden" src="{{ asset('assets/icons/done.svg') }}" alt="done">
            </button>
          </label>
        @else
          <button id="open-address" type="button"
            class="border cursor-pointer border-grey hover:border-black rounded-xl p-8 flex flex-col gap-5 justify-center items-center transition-all min-h-240p h-full">
            <div class="flex flex-col gap-2 items-center justify-center">

              <div class="p-2.5 bg-black rounded-1/2 flex items-center justify-center">
                <img src="{{ asset('assets/icons/white-plus.svg') }}" alt="plus">
              </div>

              <span class="text-xs uppercase font-normal">new address</span>
            </div>
          </button>
        @endif

      </article>
    </section>

    <x-cart.delivery :shippings="$shippings" />

    <x-cart.payment />

    <footer class="max-w-2xl mx-auto flex flex-wrap justify-center md:justify-between gap-3 md:gap-0">
      <a href="/cart" class="btn-secondary flex items-center justify-center gap-3">
        <img src="{{ asset('assets/icons/left-arrow.svg') }}" alt="left-arrow">
        back to cart
      </a>

      <button type="submit" class="btn-primary flex justify-center items-center gap-3">
        next
        <img src="{{ asset('assets/icons/right-arrow.svg') }}" alt="right arrow">
      </button>
    </footer>
  </form>

@endsection
