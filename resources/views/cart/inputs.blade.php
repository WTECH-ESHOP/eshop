@extends('layouts.app')

@section('title', 'Delivery')

@section('top')
  <x-cart.state stage="2" />
@endsection

@section('content')

  <form class="w-1/2 mx-auto" action="{{ route('delivery') }}" method="POST">
    @csrf

    <section class="mx-auto pb-8">
      <x-modals.address noForm />
    </section>

    <x-cart.delivery :shippings="$shippings" />

    <x-cart.payment />

    <section class="mx-auto flex justify-between pt-16 pb-8">
      <a href="/cart" class="btn-secondary flex items-center justify-center gap-2">
        <img src="{{ asset('assets/icons/left-arrow.svg') }}" alt="left-arrow">
        back to cart
      </a>

      <button type="submit" class="btn-primary flex justify-center items-center gap-2">
        next
        <img src="{{ asset('assets/icons/right-arrow.svg') }}" alt="right arrow">
      </button>
    </section>
  </form>

@endsection
