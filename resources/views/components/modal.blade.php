<div id="{{ $modalId }}-modal"
  class="hidden fixed justify-center items-center p-4 bottom-0 top-0 left-0 right-0 bg-black bg-opacity-50 z-99">
  <article class="relative flex flex-col gap-10 py-12 px-12 md:px-16 text-center bg-white max-w-lg w-full rounded-xl">
    <button id="close-{{ $modalId }}-modal" class="p-2 absolute top-4 right-4">
      <img src="{{ asset('assets/icons/x.svg') }}" alt="close">
    </button>

    <header>
      <h1 class="font-medium text-4xl">@yield('modalTitle')</h1>

      @hasSection('modalSubtitle')
        <p class="mt-1 text-darkGrey text-xs">
          @yield('modalSubtitle')

          @hasSection('modalButton')
            {{ ' ' }}
            <span id="{{ $modalId }}-button" class="cursor-pointer font-medium">@yield('modalButton')</span>
          @endif
        </p>
      @endif

    </header>

    @yield('modalContent')
  </article>
</div>
