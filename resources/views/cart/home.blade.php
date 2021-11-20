@extends('layouts.app')

@section('title', 'Cart')

@section('top')
  <x-cart.state stage="1" />
@endsection

@section('content')

  <section class="font-medium tracking-wide">
    <div class="hidden md:grid grid-cols-7 border-b border-grey pb-3 text-darkGrey px-5 uppercase">
      <div class="col-span-2">
        <span>product</span>
      </div>
      <div class="col-span-1 text-center">
        <span>variant</span>
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
    </div>

    <div>
      <div class="grid md:grid-cols-7 py-5 border-t md:border-t-0 border-b border-grey px-5 gap-4 md:gap-0">
        <div class="col-span-2 flex gap-5 items-center">
          <img class="w-80p h-80p rounded-10p" src="{{ asset('assets/images/placeholder.png') }}" alt="Placeholder">
          <div class="font-normal">
            <h3 class="font-medium mb-1">Lorem ipsum dolor sit amet admur</h3>
            <span class="text-xs italic">category</span>
          </div>
        </div>

        <div class="col-span-1 flex items-center flex-col justify-center gap-2">
          <x-ui.select name="volume" small />
          <x-ui.select name="flavour" small />
        </div>

        <div class="col-span-1 flex items-center justify-center">
          <span class="font-normal">15.80 €</span>
        </div>

        <div class="col-span-1 flex items-center justify-center">
          <x-ui.amount />
        </div>

        <div class="col-span-1 flex items-center justify-center">
          <span>31.60 €</span>
        </div>

        <div class="col-span-1 flex items-center justify-end">
          <button class="p-4 -mr-4">
            <img src="{{ asset('assets/icons/x.svg') }}" alt="remove">
          </button>
        </div>
      </div>
    </div>

    <div class="flex flex-wrap justify-center md:justify-between pt-16 pb-8 gap-4 md:gap-0">
      <a href="/products" class="order-2 md:order-1 btn-secondary">continue shopping</a>

      <div class="order-1 md:order-2 flex flex-wrap justify-center items-center gap-4 md:gap-10">
        <div class="flex justify-center items-center gap-4 uppercase w-full md:w-auto">
          <span class="text-base text-darkGrey">total</span>
          <span class="text-2xl text-medium">55.99 €</span>
        </div>

        <a href="/cart/delivery" class="btn-primary flex justify-center items-center gap-2">
          next
          <img src="{{ asset('assets/icons/right-arrow.svg') }}" alt="right arrow">
        </a>
      </div>
    </div>
  </section>

@endsection
