@extends('layouts.app')

@section('title', 'Cart confirmation')

@section('top')
  <x-cart.state stage="3" />
@endsection

@php
    // dd($delivery);
    $paymentPrice = $delivery['payment'] == 'cash_on_delivery' ? 1 : 0; 
@endphp

@section('content')

  <section class="w-3/4 mx-auto">
    <div class="grid md:grid-cols-2 gap-12">
      <div>
        <div class="flex flex-col gap-8">
          <div class="flex items-start gap-5">
            <img src="{{ asset('assets/icons/avatar.svg') }}" alt="avatar">
            <div class="flex flex-col">
              <span class="font-semibold">{{ $delivery['first_name'] .' '. $delivery['last_name'] }}</span>
              <span>{{ $delivery['email'] }}</span>
              <span>{{ $delivery['phone'] }}</span>
            </div>
          </div>

          <div class="flex items-start gap-5">
            <img src="{{ asset('assets/icons/gps.svg') }}" alt="gps">
            <div class="flex flex-col">
              <span>{{ $delivery['address'] }}</span>
              <span>{{ $delivery['city'] .', '. $delivery['postal_code'] }}</span>
              <span>{{ $delivery['country'] }}</span>
            </div>
          </div>

          <div class="flex items-start gap-5">
            <img src="{{ asset('assets/icons/delivery.svg') }}" alt="delivery">
            <div class="flex flex-col">
              <span>{{ ucfirst($shipping->name) }}</span>
              <span class="font-semibold">{{ number_format($shipping->price, 2) }} €</span>
            </div>
          </div>

          <div class="flex items-start gap-5">
            <img src="{{ asset('assets/icons/cash.svg') }}" alt="cash">
            <div class="flex flex-col">
              <span>{{ str_replace('_', ' ', ucfirst($delivery['payment'])) }}</span>
              <span class="font-semibold">{{ $paymentPrice ? number_format($paymentPrice, 2).' €' : 'Free' }}</span>
            </div>
          </div>
        </div>

        <form action="{{ route('cart.order') }}" method="POST" id="order-form" class="flex flex-col mt-10">
          @csrf
          <label class="text-10p text-darkGrey" for="comment">COMMENT</label>
          <textarea class="border border-grey rounded-10p h-100p p-5" name="comment" id="comment"></textarea>
          <div class="flex gap-2 mt-6">
            <input type="checkbox" name="terms" id="terms" required>
            <label class="text-10p" for="terms">I AGREE TO THE TERMS AND CONDITIONS AND PRIVACY POLICY.</label>
          </div>
        </form>
      </div>

      <div class="font-semibold">
        <span class="text-darkGrey">CART OVERVIEW</span>

        <div class="border-t border-grey mt-3">
          @php
            $subtotal = 0;
          @endphp
          @foreach ($products as $item)
            @php
                $subtotal += $item['cost'];
            @endphp
            <div class="grid md:grid-cols-3 py-5 border-b border-grey px-5 gap-4 md:gap-0">
              <div class="col-span-2 flex gap-5 items-center">
                <img class="w-80p h-80p rounded-10p" src="{{ $item['product']->images[0] }}" alt="Placeholder">
                <div>
                  <p>{{ $item['product']->name }}</p>
                  <span class="text-xs italic font-normal lowercase">
                    {{ $item['quantity'] . ' pcs - ' . $item['flavour'] . ' - ' . $item['volume'] . $item['product']->unit }}
                  </span>
                </div>
              </div>
              <div class="col-span-2 md:col-span-1 flex items-center justify-center">
                <span>{{ number_format($item['cost'], 2) }} €</span>
              </div>
            </div>
          @endforeach
        </div>

        <div class="hidden md:flex items-center gap-4 justify-end mt-5">
          <span class="text-base text-darkGrey">subtotal</span>
          <span class="text-2xl text-black">{{ number_format($subtotal, 2) }} €</span>
        </div>
      </div>
    </div>
  </section>

  <section class="w-3/4 mx-auto flex flex-wrap justify-between pt-16 pb-8 gap-4 md:gap-0">
    <a href="/cart/delivery" class="order-2 md:order-1 btn-secondary flex items-center justify-center gap-2">
      <img src="{{ asset('assets/icons/left-arrow.svg') }}" alt="left-arrow">
      back to delivery & payment
    </a>
    <div class="order-1 md:order-2 flex flex-wrap justify-center items-center gap-4 md:gap-10 font-semibold uppercase">
      <div class="flex items-center gap-4">
        <span class="text-base text-darkGrey">total</span>
        <span class="text-2xl text-black">{{ number_format($subtotal + $shipping->price + $paymentPrice, 2) }} €</span>
      </div>

      <button onclick="document.getElementById('order-form').submit()" class="btn-primary flex justify-center items-center gap-2">
        confirm order
        <img src="{{ asset('assets/icons/right-arrow.svg') }}" alt="right arrow">
      </button>
    </div>
  </section>

@endsection
