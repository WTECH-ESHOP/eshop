<nav class="hidden md:block w-full bg-black text-white">
  <div class="container uppercase font-medium flex flex-wrap justify-between items-center py-2">

    @foreach ($categories as $category)
      <a href="{{ route('products', [$category->slug]) }}"
      class="p-4 tracking-wide {{ request()->is($category->slug) ? 'font-bold' : '' }}">
        {{ $category->name }}
      </a>
    @endforeach

  </div>
</nav>
