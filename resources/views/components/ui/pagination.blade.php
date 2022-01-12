@php
$pagin = $paginator->appends(request()->except('page'));
@endphp

<div class="inline-flex items-center p-2 border border-grey rounded-xl leading-3">
  @if ($pagin->currentPage() != 1)
    <a href="{{ $pagin->previousPageUrl() }}" class="flex justify-center items-center w-8 h-8 rounded-sm">
      <img src={{ asset('/assets/icons/left.svg') }} alt="previous page">
    </a>

    <div class="bg-grey w-1p h-7 rounded-xs mx-2"></div>

    <a href="{{ $pagin->url(1) }}" class="flex justify-center items-center w-8 h-8 rounded-sm">
      1
    </a>

    @if ($pagin->currentPage() - 2 > 1)
      <span class="flex justify-center items-center w-8 h-8 rounded-sm">
        ...
      </span>
    @endif

    {{-- left number --}}
    @if ($pagin->currentPage() - 1 > 1)
      <a href={{ $pagin->previousPageUrl() }} class="flex justify-center items-center w-8 h-8 rounded-sm">
        {{ $pagin->currentPage() - 1 }}
      </a>
    @endif
  @endif

  {{-- middle number --}}
  <a href={{ $pagin->url($pagin->currentPage()) }}
    class="flex justify-center items-center w-8 h-8 rounded-sm bg-secondary text-white font-medium">
    {{ $pagin->currentPage() }}
  </a>

  @if ($pagin->currentPage() != $pagin->lastPage())
    {{-- right number --}}
    @if ($pagin->currentPage() + 1 < $pagin->lastPage())
      <a href="{{ $pagin->nextPageUrl() }}" class="flex justify-center items-center w-8 h-8 rounded-sm">
        {{ $pagin->currentPage() + 1 }}
      </a>
    @endif

    @if ($pagin->currentPage() + 2 < $pagin->lastPage())
      <span class="flex justify-center items-center w-8 h-8 rounded-sm">
        ...
      </span>
    @endif

    <a href="{{ $pagin->url($pagin->lastPage()) }}" class="flex justify-center items-center w-8 h-8 rounded-sm">
      {{ $pagin->lastPage() }}
    </a>

    <div class="bg-grey w-1p h-8 rounded-xs mx-2"></div>

    <a href="{{ $pagin->nextPageUrl() }}" class="flex justify-center items-center w-8 h-8 rounded-sm">
      <img class="transform rotate-180" src={{ asset('/assets/icons/left.svg') }} alt="right arrow">
    </a>
  @endif
</div>
