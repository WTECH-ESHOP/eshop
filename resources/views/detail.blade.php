@extends('layouts.app')

@section('title', 'Detail')

@section('content')

<article class="pb-16 flex flex-col lg:flex-row gap-8 md:gap-16 lg:gap-24 xl:gap-36">
  <header class="uppercase font-medium tracking-wide lg:hidden">
    <h1 class="text-3xl leading-10 mb-2">Lorem ipsum dolor sit amet magna justo</h1>
    <span class="text-darkGrey">Scitec Nutrition</span>
  </header>

  <section class="flex flex-col w-full lg:w-3/6 gap-6">
    <figure class="w-full object-cover object-center rounded-xl overflow-hidden">
      <img class="w-full" src={{ asset('assets/images/placeholder.png') }} alt="galery image 1">
    </figure>

    <footer class="grid gap-4 sm:gap-8 grid-cols-4">
      <a class="w-full object-cover object-center rounded-xl overflow-hidden" href="#">
        <img class="w-full" src={{ asset('assets/images/placeholder.png') }} alt="galery image 1">
      </a>
      <a class="w-full object-cover object-center rounded-xl overflow-hidden" href="#">
        <img class="w-full" src={{ asset('assets/images/placeholder.png') }} alt="galery image 1">
      </a>
      <a class="w-full object-cover object-center rounded-xl overflow-hidden" href="#">
        <img class="w-full" src={{ asset('assets/images/placeholder.png') }} alt="galery image 1">
      </a>

      <button class="w-full rounded-xl border-2 border-grey min-h-full">
        <span class="uppercase font-medium text-darkGrey tracking-wide">show<br />more</span>
      </button>
    </footer>
  </section>

  <section class="flex flex-1 flex-col gap-8">
    <header class="uppercase font-medium tracking-wide hidden lg:block">
      <h1 class="text-3xl leading-10 mb-2">Lorem ipsum dolor sit amet magna justo</h1>
      <span class="text-darkGrey">Scitec Nutrition</span>
    </header>

    <p class="leading-6 tracking-wide text-darkGrey">
      Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa,
      convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Vestibulum ante ipsum
      primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel,
      ullamcorper sit amet ligula. Proin eget tortor risus. Curabitur aliquet quam id dui posuere blandit. Pellentesque
      in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.
    </p>

    <div class="flex gap-4 tracking-wide items-center my-4">
      <span class="uppercase font-medium text-darkGrey">price</span>
      <span class="font-medium text-4xl">15.99 €</span>
    </div>

    <div class="flex gap-6 mb-3">
      <x-ui.select name="flavour" label="Flavour" />
      <x-ui.select name="volume" label="Volume" />
    </div>

    <div class="flex w-full h-16 border rounded-xl border-secondary tracking-wide overflow-hidden">
      <div class="flex flex-grow-2 gap-2 items-center px-3 py-3 border-r border-secondary justify-center">
        <button class="flex px-2 w-full items-center justify-center">
          <img src={{ asset('assets/icons/minus.svg') }} alt="minus icon">
        </button>

        <span class="text-lg">2</span>

        <button class="flex px-2 w-full items-center justify-center">
          <img src={{ asset('assets/icons/plus.svg') }} alt="plus icon">
        </button>
      </div>


      <div class="flex flex-grow-2 items-center px-6 py-3 justify-center">
        <span class="font-medium text-lg">31.98 €</span>
      </div>

      <button class="flex flex-grow-6 items-center gap-4 px-8 py-3 bg-secondary justify-center">
        <span class="uppercase text-white font-medium">Add to cart</span>
        <img src={{ asset('assets/icons/white-cart.svg') }} alt="cart icon">
      </button>
    </div>
  </section>
</article>

<article class="markdown border-t border-grey pt-14">
  <img src={{ asset('assets/images/placeholder.png') }} alt="placeholder">

  <h1>Lorem ipsum dolor sit amet</h1>
  <p>
    Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa,
    convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus. Praesent sapien
    massa, convallis a pellentesque nec, egestas non nisi.
  </p>
  <p>
    Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
    cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget tortor
    risus. Curabitur aliquet quam id dui posuere blandit. Pellentesque in ipsum id orci porta dapibus. Praesent sapien
    massa, convallis a pellentesque nec, egestas non nisi.
  </p>
  <p>
    Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
    cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget tortor
    risus. Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
    posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget
    tortor risus.
  </p>
  <table>
    <tr>
      <th>Lorem ipsum dolor sit</th>
      <th></th>
    </tr>
    <tr>
      <td>Lorem ipsum</td>
      <td>dolor sit</td>
    </tr>
    <tr>
      <td>Lorem ipsum</td>
      <td>dolor sit</td>
    </tr>
    <tr>
      <td>Lorem ipsum</td>
      <td>dolor sit</td>
    </tr>
    <tr>
      <td>Lorem ipsum</td>
      <td>dolor sit</td>
    </tr>
  </table>
  <p>
    Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
    cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget tortor
    risus. Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
    posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget
    tortor risus.
  </p>
</article>

@endsection