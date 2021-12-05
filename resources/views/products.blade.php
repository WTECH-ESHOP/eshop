@extends('layouts.app')

@section('title', ucfirst($category->name))

@section('content')

  {{-- TODO: CSS fix, mobile filter --}}
  <aside id="side-filter" class="transform md:transform-none -translate-x-full fixed md:sticky w-screen h-screen md:h-auto md:w-1/3 top-0 md:-top-10 md:block lg:w-1/4 py-10 float-left pr-8 bg-white bg-current z-50 md:overflow-auto transition-all">
    <svg id="close-side-filter" class="md:hidden w-10 h-10 ml-auto" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style></defs><title/><g id="cross"><line class="cls-1" x1="7" x2="25" y1="7" y2="25"/><line class="cls-1" x1="7" x2="25" y1="25" y2="7"/></g></svg>
    {{-- price filter --}}
    <div class="flex flex-col gap-2 mt-10">
      <div class="uppercase p-2">
        <p class="text-darkGrey text-sm font-medium">price</p>
      </div>

      <div class="flex flex-col gap-4">
        <div id="slider-handles" min="0" max="{{ ceil($maxQuantity->price) }}"></div>

        <div class="pl-2 flex justify-between" id="slider-non-linear-step-value">
          <div id="price-min" class="filter" param="p" key="p"></div>
          <div id="price-max" class="filter" param="p" key="p"></div>
        </div>
      </div>
    </div>

    {{-- category filter --}}
    <div class="flex flex-col gap-2 mt-10">
      <div class="uppercase border-b border-grey p-2">
        <p class="text-darkGrey text-sm font-medium">category</p>
      </div>

      <div class="scrollbar flex flex-col gap-3 p-2 max-h-32 overflow-y-auto items-start">
        @foreach ($category->subcategories as $subcategory)
          <x-ui.checkbox name="category" :value="$subcategory->slug" :label="$subcategory->name" param="c" />
        @endforeach
      </div>
    </div>

    {{-- flavour filter --}}
    <div class="flex flex-col gap-2 mt-10">
      <div class="uppercase border-b border-grey p-2">
        <p class="text-darkGrey text-sm font-medium">flavour</p>
      </div>

      <div class="scrollbar flex flex-col gap-3 p-2 max-h-32 overflow-y-auto items-start">
        @foreach ($flavours as $flavour)
          <x-ui.checkbox name="flavour" :value="$flavour" :label="$flavour" param="f" />
        @endforeach
      </div>
    </div>

    {{-- volume filter --}}
    <div class="flex flex-col gap-2 mt-10">
      <div class="uppercase border-b border-grey p-2">
        <p class="text-darkGrey text-sm font-medium">volume</p>
      </div>

      <div class="scrollbar flex flex-col gap-3 p-2 max-h-32 overflow-y-auto items-start">
        @foreach ($volumes as $volume)
          <x-ui.checkbox name="volume" :value="$volume" :label="$volume.' g / ks'" param="v" />
        @endforeach
      </div>
    </div>

    {{-- brand filter --}}
    <div class="flex flex-col gap-2 mt-10">
      <div class="uppercase border-b border-grey p-2">
        <p class="text-darkGrey text-sm font-medium">brand</p>
      </div>

      <div class="scrollbar flex flex-col gap-3 p-2 max-h-32 overflow-y-auto items-start">
        @foreach ($brands as $brand)
          <x-ui.checkbox name="brand" :value="$brand" label="{{ str_replace('_', ' ', $brand) }}" param="b" />
        @endforeach
      </div>
    </div>
  </aside>

  {{-- content --}}
  <article class="w-full md:w-2/3 lg:w-3/4 float-right">
    <header class="font-medium mb-8">
      <h1 class="uppercase text-2xl">{{ $category->name }}</h1>
      <span class="text-xs text-darkGrey">{{ $products->total() }} products</span>
    </header>

    {{-- filter values --}}
    <div class="flex w-full md:flex-wrap justify-between mb-6 gap-4">
      <div id="params-list" class="gap-4 flex-grow hidden md:flex">
        <button class="param-item gap-3 py-3 px-4 bg-grey rounded-xl self-end items-center hidden">
          <span class="param-item-text uppercase text-xs">sample param item</span>
          <img class="remove-param w-2" src={{ asset('assets/icons/x.svg') }} alt="remove">
        </button>

        @if (Request::except('page', 'o'))
          <button id="cancel-params" class="py-3 uppercase text-10p self-end items-center leading-4">
            cancel parameters
          </button>
        @endif
      </div>

      {{-- order --}}
      <button id="open-side-filter" class="flex w-full md:w-auto gap-6 justify-between items-center btn-primary md:hidden py-3">
        <span>filter</span>
        <img src={{ asset('assets/icons/filter.svg') }} alt="filter">
      </button>

      <select id="filter-order" class="border cursor-pointer uppercase md:max-w-200p" name="arrangement">
        <option value="updated_at-desc">latest</option>
        <option value="updated_at-asc">oldest</option>
      </select>
    </div>

    {{-- products --}}
    <section class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-7">
      @forelse ($products as $product)
        <x-product :data="$product" />
      @empty
        No products...
      @endforelse
    </section>

    {{-- pagination --}}
    @if ($products->hasPages())
      <footer class="flex justify-center pt-14">
        <x-ui.pagination :paginator="$products" />
      </footer>
    @endif
  </article>

@overwrite
