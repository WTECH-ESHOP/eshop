<div class="inline-flex items-center p-2 border border-grey rounded-xl leading-3">
  @if ($paginator->currentPage() != 1)
    <a href="{{ $paginator->previousPageUrl() }}" class="flex justify-center items-center w-8 h-8 rounded-sm">
      <img src={{ asset('/assets/icons/left.svg') }} alt="previous page">
    </a>

    <div class="bg-grey w-1p h-7 rounded-xs mx-2"></div>

    <a href="?page=1" class="flex justify-center items-center w-8 h-8 rounded-sm">
      1
    </a>

    @if ($paginator->currentPage() - 2 > 1)
      <span class="flex justify-center items-center w-8 h-8 rounded-sm">
        ...
      </span>
    @endif

    {{-- left number --}}
    @if ($paginator->currentPage() - 1 > 1)
      <a href={{ $paginator->previousPageUrl() }} class="flex justify-center items-center w-8 h-8 rounded-sm">
        {{ $paginator->currentPage() - 1 }}
      </a>
    @endif
  @endif


  {{-- middle number --}}
  <a href={{ $paginator->currentPage() }}
    class="flex justify-center items-center w-8 h-8 rounded-sm bg-secondary text-white font-medium">
    {{ $paginator->currentPage() }}
  </a>

  @if ($paginator->currentPage() != $paginator->lastPage())
    {{-- right number --}}
    @if ($paginator->currentPage() + 1 < $paginator->lastPage())
      <a href="{{ $paginator->nextPageUrl() }}" class="flex justify-center items-center w-8 h-8 rounded-sm">
        {{ $paginator->currentPage() + 1 }}
      </a>
    @endif

    @if ($paginator->currentPage() + 2 < $paginator->lastPage())
      <span class="flex justify-center items-center w-8 h-8 rounded-sm">
        ...
      </span>
    @endif

    <a href="?page={{ $paginator->lastPage() }}" class="flex justify-center items-center w-8 h-8 rounded-sm">
      {{ $paginator->lastPage() }}
    </a>

    <div class="bg-grey w-1p h-8 rounded-xs mx-2"></div>

    <a href="{{ $paginator->nextPageUrl() }}" class="flex justify-center items-center w-8 h-8 rounded-sm">
      <img class="transform rotate-180" src={{ asset('/assets/icons/left.svg') }} alt="right arrow">
    </a>
  @endif
</div>
