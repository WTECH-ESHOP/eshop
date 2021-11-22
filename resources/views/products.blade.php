@extends('layouts.app')

@section('title', ucfirst($category->name))

@section('content')

  <aside class="hidden md:block w-1/3 lg:w-1/4 py-10 sticky -top-10 float-left pr-8">
    <div class="flex flex-col gap-2 mt-10">
      <div class="uppercase p-2">
        <p class="text-darkGrey text-sm font-medium">price</p>
      </div>

      <input name="range" type="range" min="0" max="100" step="5" />
    </div>

    <div class="flex flex-col gap-2 mt-10">
      <div class="uppercase border-b border-grey p-2">
        <p class="text-darkGrey text-sm font-medium">category</p>
      </div>

      <div class="scrollbar flex flex-col gap-3 p-2 max-h-32 overflow-y-auto">
        @foreach ($category->subcategories as $subcategory)
          <x-ui.checkbox name="category[]" :value="$subcategory->slug" :label="$subcategory->name" param="c" />
        @endforeach
      </div>
    </div>

    <div class="flex flex-col gap-2 mt-10">
      <div class="uppercase border-b border-grey p-2">
        <p class="text-darkGrey text-sm font-medium">flavour</p>
      </div>

      <div class="scrollbar flex flex-col gap-3 p-2 max-h-32 overflow-y-auto">
        @foreach ($flavours as $flavour)
          <x-ui.checkbox name="flavour[]" :value="$flavour" :label="$flavour" param="f" />
        @endforeach
      </div>
    </div>

    <div class="flex flex-col gap-2 mt-10">
      <div class="uppercase border-b border-grey p-2">
        <p class="text-darkGrey text-sm font-medium">volume</p>
      </div>

      <div class="scrollbar flex flex-col gap-3 p-2 max-h-32 overflow-y-auto">
        <x-ui.checkbox name="volume[]" value="0-250" label="250g and less" />
        <x-ui.checkbox name="volume[]" value="500-750" label="500 - 750g" />
        <x-ui.checkbox name="volume[]" value="1000-2000" label="1000 g" />
        <x-ui.checkbox name="volume[]" value="2000-4000" label="2 - 4kg" />
        <x-ui.checkbox name="volume[]" value="4000-0" label="4k and more" />
      </div>
    </div>

    <div class="flex flex-col gap-2 mt-10">
      <div class="uppercase border-b border-grey p-2">
        <p class="text-darkGrey text-sm font-medium">brand</p>
      </div>

      <div class="scrollbar flex flex-col gap-3 p-2 max-h-32 overflow-y-auto">
        @foreach ($brands as $brand)
          <x-ui.checkbox name="brand[]" :value="$brand" label="{{ str_replace('_', ' ', $brand) }}" param="b" />
        @endforeach
      </div>
    </div>
  </aside>

  <article class="w-full md:w-2/3 lg:w-3/4 float-right">
    <header class="font-medium mb-8">
      <h1 class="uppercase text-2xl">{{ $category->name }}</h1>
      <span class="text-xs text-darkGrey">{{ $products->total() }} products</span>
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
      @forelse ($products as $product)
        <x-product :data="$product" />
      @empty
        No products...
      @endforelse
    </section>

    @if ($products->hasPages())
      <footer class="flex justify-center pt-14">
        <x-ui.pagination :paginator="$products" />
      </footer>
    @endif
  </article>

@endsection

<script>
  var cat = []
  var fla = []
  var bra = []

  const createListeners = (name, set, p) => {
    const checkboxes = document.querySelectorAll(`input[type=checkbox][name='${name}']`)

    checkboxes.forEach((checkbox) =>
      checkbox.addEventListener('change', (e) => {
        if (e.target.checked)
          set.add(e.target.value)
        else
          set.delete(e.target.value)

        const catRoute = [...cat].join(',')
        const flaRoute = [...fla].join(',')
        const braRoute = [...bra].join(',')

        let route = []

        if (catRoute) route = [...route, `c=${catRoute}`]
        if (flaRoute) route = [...route, `f=${flaRoute}`]
        if (braRoute) route = [...route, `b=${braRoute}`]

        if (route.length)
          window.location.href = `?${route.join('&')}`
      })
    )
  }

  window.onload = () => {
    const catParams = "{{ request('c') }}"
    const catArray = catParams ? catParams.split(',') : []
    cat = new Set(catArray)

    const flaParams = "{{ request('f') }}"
    const flaArray = flaParams ? flaParams.split(',') : []
    fla = new Set(flaArray)

    const braParams = "{{ request('b') }}"
    const braArray = braParams ? braParams.split(',') : []
    bra = new Set(braArray)

    createListeners('category[]', cat, 'c')
    createListeners('flavour[]', fla, 'f')
    createListeners('brand[]', bra, 'b')
  }
</script>
