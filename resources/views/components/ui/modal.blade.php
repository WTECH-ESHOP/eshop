<div id={{ $name }} class="fixed bottom-0 top-0 left-0 right-0 bg-black bg-opacity-50">
  <button class="p-2 absolute top-4 right-4">
    <img src="{{ asset('assets/icons/x.svg') }}" alt="close">
  </button>


  <article class="flex flex-col mx-center gap-10 py-12 px-16 text-center">
    {{ $slot }}
  </article>
</div>