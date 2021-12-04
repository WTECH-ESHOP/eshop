@extends('layouts.app')

@section('title', $data->name)

@section('content')

  <article class="pb-16 flex flex-col lg:flex-row gap-8 md:gap-16 lg:gap-24 xl:gap-36">
    <header class="uppercase font-medium tracking-wide lg:hidden">
      <h1 class="text-3xl leading-10 mb-2">{{ $data->name }}</h1>
      <span class="text-darkGrey">{{ str_replace('_', ' ', $data->brand) }}</span>
    </header>

    {{-- Galery --}}
    <section class="flex flex-col w-full lg:w-3/6 gap-6">
      <figure class="rect-image w-full object-cover object-center rounded-xl overflow-hidden">
        <img class="rect-image w-full" src={{ $data->images[0] }} alt="galery image 0">
        {{-- TODO: image from storage --}}
      </figure>

      <footer class="grid gap-4 sm:gap-8 grid-cols-4">
        @php
          $count = count($data->images) > 4 ? 4 : count($data->images);
        @endphp

        @for ($i = 1; $i < $count; $i++)
          <a class="rect-image w-full object-cover object-center rounded-xl overflow-hidden" href="#">
            <img class="rect-image w-full" src={{ $data->images[$i] }} alt="galery image {{ $i }}">
          </a>
        @endfor

        <button class="w-full rounded-xl border-2 border-grey min-h-full">
          <span class="uppercase font-medium text-darkGrey tracking-wide">show<br />more</span>
        </button>
      </footer>
    </section>

    {{-- description --}}
    <section class="flex flex-1 flex-col gap-8">
      <header class="uppercase font-medium tracking-wide hidden lg:block">
        <h1 class="text-3xl leading-10 mb-2">{{ $data->name }}</h1>
        <span class="text-darkGrey">{{ str_replace('_', ' ', $data->brand) }}</span>
      </header>

      <p class="leading-6 tracking-wide text-darkGrey">{{ $data->description }}</p>

      <div class="flex gap-4 tracking-wide items-center my-4">
        <span class="uppercase font-medium text-darkGrey">price</span>
        <span id="unit-price" class="font-medium text-4xl">{{ number_format($data->variant->price, 2) }} €</span>
      </div>

      <form action="{{ route('addToCart', [$data->id]) }}" method="POST" class="flex flex-1 flex-col gap-8">
        @csrf

        <div class="flex gap-6 mb-3">
          <x-ui.select name="flavour" label="Flavour" :options="$data->variants" />
          <x-ui.select name="volume" label="Volume" :options="[]" />
        </div>

        <div class="flex w-full h-16 border rounded-xl border-secondary tracking-wide overflow-hidden">
          <div class="flex flex-grow-2 gap-2 items-center px-3 py-3 border-r border-secondary justify-center">
            <button type="button" id="decrement-quantity" class="flex px-2 w-full h-full items-center justify-center">
              <img src={{ asset('assets/icons/minus.svg') }} alt="minus icon">
            </button>

            <input id="input-quantity" type="hidden" class="hidden" name="quantity" value="1">
            <span id="value-quantity" class="text-lg">1</span>

            <button type="button" id="increment-quantity" class="flex px-2 w-full items-center justify-center h-full">
              <img src={{ asset('assets/icons/plus.svg') }} alt="plus icon">
            </button>
          </div>

          <div class="flex flex-grow-2 items-center px-6 py-3 justify-center">
            <span id="price" class="font-medium text-lg">{{ number_format($data->variant->price, 2) }} €</span>
          </div>

          <button type="submit" class="flex flex-grow-6 items-center gap-4 px-8 py-3 bg-secondary justify-center">
            <span class="uppercase text-white font-medium">Add to cart</span>
            <img src={{ asset('assets/icons/white-cart.svg') }} alt="cart icon">
          </button>
        </div>

        {{-- TODO: snackbar --}}
        @if (Session::get('success'))
          <div class="text-green-800 w-full">
            {{ Session::get('success') }}
          </div>
        @endif
      </form>
    </section>
  </article>

  {{-- informations --}}
  <article class="markdown border-t border-grey pt-14">
    {!! Illuminate\Support\Str::markdown($data->information) !!}
  </article>
@overwrite

@push('scripts')
  <script>
    const dataFlavour = <?= $data->variants ?>;
    const initId = <?= $data->variant->id ?>;
    const initId2 = <?= $data->variant->variant_id ?>;
    var variant;
    var quantity;

    function handleVariants() {
      let flavour = document.querySelector('#flavour');
      flavour.value = initId2;

      const volume = document.getElementById('volume');
      const unitPrice = document.getElementById('unit-price');
      const price = document.getElementById('price');
      const span = document.getElementById('value-quantity');
      const input = document.getElementById('input-quantity');

      let selectedFlavour = flavour?.value;

      variant = dataFlavour?.find(item => item.id == selectedFlavour);
      quantity = variant?.quantities?.find(item => item?.id == initId);
      volume.innerHTML = '';

      unitPrice.innerHTML = `${(+quantity?.price).toFixed(2)} €`;
      price.innerHTML = `${(+quantity?.price).toFixed(2)} €`;

      variant?.quantities?.forEach(item => {
        let option = document.createElement('option');
        option.text = item?.volume;
        option.value = item?.id;
        volume.add(option);
      });

      volume.value = initId;

      flavour?.addEventListener('change', event => {
        let selectedFlavour = event?.target?.value;

        variant = dataFlavour?.find(item => item.id == selectedFlavour);
        volume.innerHTML = '';
        unitPrice.innerHTML = `${(+quantity?.price).toFixed(2)} €`;
        price.innerHTML = `${(+quantity?.price).toFixed(2)} €`;
        span.innerText = '1';
        input.value = '1';

        variant?.quantities?.forEach(item => {
          let option = document.createElement('option');
          option.text = item?.volume;
          option.value = item?.id;
          volume.add(option);
        });

        quantity = variant?.quantities?.find(item => item.id == volume.value);
        unitPrice.innerHTML = `${(+quantity?.price).toFixed(2)} €`;
        price.innerHTML = `${(+quantity?.price).toFixed(2)} €`;
      });

      volume?.addEventListener('change', event => {
        let selectedVolume = event?.target?.value;
        quantity = variant?.quantities?.find(item => item.id == selectedVolume);

        unitPrice.innerHTML = `${(+quantity?.price).toFixed(2)} €`;
        price.innerHTML = `${(+quantity?.price).toFixed(2)} €`;
        span.innerText = '1';
        input.value = '1';
      });
    }

    function handleQuantity() {
      let increment = document.getElementById('increment-quantity');
      let decrement = document.getElementById('decrement-quantity');
      const span = document.getElementById('value-quantity');
      const input = document.getElementById('input-quantity');
      const price = document.getElementById('price');

      increment?.addEventListener('click', () => {
        let value = +input.value + 1;
        span.innerHTML = value;
        input.value = value;

        quantity = variant?.quantities?.find(item => item.id == volume.value);
        price.innerHTML = `${(+quantity?.price * value).toFixed(2)} €`;
      });

      decrement?.addEventListener('click', () => {
        let value = +input.value - 1;

        if (value > 0) {
          span.innerHTML = value;
          input.value = value;
          let quantity = variant?.quantities?.find(item => item.id == volume.value);
          price.innerHTML = `${(+quantity.price * value).toFixed(2)} €`;
        }
      });
    }

    document.addEventListener("DOMContentLoaded", () => {
      handleVariants();
      handleQuantity();
    });
  </script>
@endpush
