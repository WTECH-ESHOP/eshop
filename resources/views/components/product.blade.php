@php
$slug = $data->subcategory->category->slug;
@endphp

<article class="flex flex-col">
  <a href={{ route('detail', [$slug, $data->id]) }} class="long-image w-full max-h-400p relative">
    <img src={{ $data->images[0] }} alt="{{ $data->name }} photo"
      class="long-image rounded-xl w-full object-cover object-center">

    <button class="absolute bottom-0 right-0 bg-secondary px-5 py-3 rounded-tl-xl rounded-br-xl">
      <img class="w-4 h-4" src={{ asset('assets/icons/white-cart.svg') }} alt="add to cart">
    </button>
  </a>

  <a href={{ route('detail', [$slug, $data->id]) }} class="flex flex-col p-2 text-lg">
    <h3>{{ $data->name }}</h3>
    <span class="font-medium">from {{ number_format($data->variant->price, 2) }}€</span>
  </a>
</article>
