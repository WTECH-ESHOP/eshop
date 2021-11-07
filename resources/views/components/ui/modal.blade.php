<div class="fixed flex justify-center items-center bottom-0 top-0 left-0 right-0 bg-black bg-opacity-50">
  <article class="relative flex flex-col gap-10 py-12 px-16 text-center bg-white max-w-lg w-full rounded-xl">
    <button class="p-2 absolute top-4 right-4">
      <img src="{{ asset('assets/icons/x.svg') }}" alt="close">
    </button>

    <header>
      <h1 class="font-medium text-4xl">{{ $title }}</h1>
      @isset ($subtitle)
      <p class="mt-1 text-darkGrey text-xs">{{ $subtitle ?? '' }}{{ $button ?? '' }}</p>
      @endisset
    </header>

    {{ $slot }}
  </article>
</div>