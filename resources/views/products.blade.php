@extends('layouts.app')

@section('title', 'Home')

@section('content')

<aside class="hidden md:block w-1/3 lg:w-1/4 py-10 sticky -top-10 float-left pr-8">
  <div class="flex flex-col gap-2 mt-10">
    <div class="uppercase  p-2">
      <p class="text-darkGrey text-sm font-medium">price</p>
    </div>

    <input name="range" type="range" min="0" max="100" step="5" />
  </div>

  <div class="flex flex-col gap-2 mt-10">
    <div class="uppercase border-b border-grey p-2">
      <p class="text-darkGrey text-sm font-medium">category</p>
    </div>

    <div class="scrollbar flex flex-col gap-3 p-2 max-h-32 overflow-y-auto">
      <x-ui.checkbox name="whey_protein" label="whey protein" />
      <x-ui.checkbox name="whey_isolate" label="whey isolate" />
      <x-ui.checkbox name="vegan_protein" label="vegan protein" />
      <x-ui.checkbox name="dairy_casein" label="dairy & casein" />
      <x-ui.checkbox name="mixture_formulas" label="mixture & formulas" />
    </div>
  </div>

  <div class="flex flex-col gap-2 mt-10">
    <div class="uppercase border-b border-grey p-2">
      <p class="text-darkGrey text-sm font-medium">flavour</p>
    </div>

    <div class="scrollbar flex flex-col gap-3 p-2 max-h-32 overflow-y-auto">
      <x-ui.checkbox name="chocolate" label="chocolate" />
      <x-ui.checkbox name="strawberry" label="strawberry" />
      <x-ui.checkbox name="white_chocolate" label="white chocolate" />
      <x-ui.checkbox name="berries" label="berries" />
    </div>
  </div>

  <div class="flex flex-col gap-2 mt-10">
    <div class="uppercase border-b border-grey p-2">
      <p class="text-darkGrey text-sm font-medium">volume</p>
    </div>

    <div class="scrollbar flex flex-col gap-3 p-2 max-h-32 overflow-y-auto">
      <x-ui.checkbox name="250" label="250g and less" />
      <x-ui.checkbox name="500" label="500 - 750g" />
      <x-ui.checkbox name="1000" label="1000 g" />
      <x-ui.checkbox name="2" label="2 - 4kg" />
      <x-ui.checkbox name="4" label="4k and more" />
    </div>
  </div>

  <div class="flex flex-col gap-2 mt-10">
    <div class="uppercase border-b border-grey p-2">
      <p class="text-darkGrey text-sm font-medium">brand</p>
    </div>

    <div class="scrollbar flex flex-col gap-3 p-2 max-h-32 overflow-y-auto">
      <x-ui.checkbox name="amix" label="amix" />
      <x-ui.checkbox name="biotech_usa" label="biotech usa" />
      <x-ui.checkbox name="best_nutrition" label="best nutrition" />
      <x-ui.checkbox name="mutant" label="mutant" />
      <x-ui.checkbox name="scitec_nutrition" label="scitec nutrition" />
    </div>
  </div>
</aside>

<article class="w-full md:w-2/3 lg:w-3/4 float-right">
  <header class="font-medium mb-8">
    <h1 class="uppercase text-2xl">Proteins</h1>
    <span class="text-xs text-darkGrey">45 products</span>
  </header>

  <div class="flex w-full md:flex-wrap justify-between mb-6 gap-4">
    <div class="gap-4 flex-grow hidden md:flex">
      <button class="flex gap-3 py-3 px-4 bg-grey rounded-xl self-end items-center">
        <span class="uppercase text-xs">whey protein</span>
        <img class="w-2" src={{ asset('assets/icons/x.svg') }} alt="close">
      </button>

      <button class="flex gap-3 py-3 px-4 bg-grey rounded-xl self-end items-center">
        <span class="uppercase text-xs">chocolate</span>
        <img class="w-2" src={{ asset('assets/icons/x.svg') }} alt="close">
      </button>

      <button class="py-3 uppercase text-10p self-end items-center leading-4">
        cancel parameters
      </button>
    </div>

    <button class="flex w-full md:w-auto gap-6 justify-between items-center btn-primary md:hidden py-3">
      <span>filter</span>
      <img src={{ asset('assets/icons/filter.svg') }} alt="filter">
    </button>

    <select class="border cursor-pointer uppercase md:max-w-200p" name="arrangement">
      <option value="latest" default>latest</option>
      <option value="price">price</option>
    </select>
  </div>

  <section class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-7">
    @foreach($products as $product)
      <x-product :data="$product"/>
    @endforeach
  </section>

  <footer class="flex justify-center pt-14">
    <x-ui.pagination :paginator="$products"/>
  </footer>
</article>

@endsection