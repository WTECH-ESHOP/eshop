@php
$path = "/{$data->subcategory->category->name}/{$data->id}";
@endphp

<article class="flex flex-col">
  <a class="rec-image w-full max-h-400p relative" href={{ $path }}>
    <img src={{ $data->images[0] }} alt="{{ $data->name }} photo"
      class="rec-image rounded-xl w-full object-cover object-center">

    <button class="absolute bottom-0 right-0 bg-secondary px-5 py-3 rounded-tl-xl rounded-br-xl">
      <img class="w-4 h-4" src={{ asset('assets/icons/white-cart.svg') }} alt="add to cart">
    </button>
  </a>

  <a class="flex flex-col p-2 text-lg" href={{ $path }}>
    <h3>{{ $data->name }}</h3>
    <span class="font-medium">from 19.99€</span>
  </a>
</article>
