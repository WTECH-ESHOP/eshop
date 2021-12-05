<div class="{{ $class ?? '' }} sm:max-w-xs md:max-w-sm lg:max-w-lg w-full relative remote">
  <input id={{ $id }} name="search" type="text" class="search-icon w-full pr-12"
    placeholder="Search for a product" autocomplete="off" />

  <img class="absolute right-4 top-1/2 transform -translate-y-1/2 w-18p h-18p"
    src="{{ asset('assets/icons/search.svg') }}" alt="search">
</div>
