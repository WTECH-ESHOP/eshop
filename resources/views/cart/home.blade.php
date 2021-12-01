@extends('layouts.app')

@section('title', 'Cart')

@section('top')
  <x-cart.state stage="1" />
@endsection

@section('content')

  <section class="font-medium tracking-wide">
    <header class="hidden md:grid grid-cols-6 border-b border-grey pb-3 text-darkGrey px-5 uppercase">
      <div class="col-span-2">
        <span>product</span>
      </div>
      <div class="col-span-1 text-center">
        <span>price</span>
      </div>
      <div class="col-span-1 text-center">
        <span>amount</span>
      </div>
      <div class="col-span-1 text-center">
        <span>cost</span>
      </div>
      <div class="col-span-1 text-center"></div>
    </header>

    <div>
      @php
        $total = 0;
      @endphp

      @forelse ($products as $key => $item)
        @php
          $total += $item['cost'];
        @endphp

        <article class="grid md:grid-cols-6 py-5 border-t md:border-t-0 border-b border-grey px-5 gap-4 md:gap-0">
          <header class="col-span-2 flex gap-5 items-center">
            <img class="w-80p h-80p rounded-10p" src="{{ $item['product']->images[0] }}"
              alt="{{ $item['product']->name }} image">

            <div class="font-normal">
              <h3 class="font-medium mb-1">{{ $item['product']->name }}</h3>
              <span class="text-xs italic">{{ $item['product']->subcategory->category->name }}</span>
            </div>
          </header>

          <div class="col-span-1 flex items-center justify-center">
            <span class="font-normal">{{ number_format($item['quantity']->price, 2) }} €</span>
          </div>

          <div class="col-span-1 flex items-center justify-center">
            <x-ui.amount :key="$key" :amount="$item['amount']" />
          </div>

          <div class="col-span-1 flex items-center justify-center">
            <span>{{ number_format($item['cost'], 2) }} €</span>
          </div>

          <form action="{{ route('removeFromCart', [$key]) }}" method="POST"
            class="col-span-1 flex items-center justify-end">
            @csrf
            @method('DELETE')

            <button type="submit" class="p-4 -mr-4">
              <img src="{{ asset('assets/icons/x.svg') }}" alt="remove">
            </button>
          </form>
        </article>

      @empty

        <p class="w-full text-center p-12">
          No items in cart...
        </p>

      @endforelse
    </div>

    <footer
      class="flex flex-wrap justify-center {{ !empty($products) ? 'md:justify-between' : '' }} pt-16 pb-8 gap-4 md:gap-0">
      <a href="/proteins" class="order-2 md:order-1 btn-secondary">continue shopping</a>

      @if (!empty($products))
        <div class="order-1 md:order-2 flex flex-wrap justify-center items-center gap-4 md:gap-10">
          <div class="flex justify-center items-center gap-4 uppercase w-full md:w-auto">
            <span class="text-base text-darkGrey">total</span>
            <span class="text-2xl text-medium">{{ number_format($total, 2) }} €</span>
          </div>

          <a href="{{ route('cart.delivery') }}" class="btn-primary flex justify-center items-center gap-2">
            next
            <img src="{{ asset('assets/icons/right-arrow.svg') }}" alt="right arrow">
          </a>
        </div>
      @endif
    </footer>
  </section>

@endsection
