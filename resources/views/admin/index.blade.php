@extends('layouts.admin')

@section('title', 'Products')

@section('content')

  @include('admin.partials.header')

  <article class="container mb-14">
    <header class="flex flex-wrap justify-center md:justify-between mb-6 gap-5">
      <a class="btn-primary w-full sm:w-auto text-center" href="{{ route('admin.product.show') }}">new product</a>

      @if ($products->hasPages())
        {{ $products->onEachSide(-1)->links() }}
      @endif
    </header>

    <section class="flex flex-col gap-10 md:gap-4">
      @forelse ($products as $product)
        <article class="flex flex-col sm:flex-row justify-between items-center gap-4">
          <header class="flex flex-col sm:flex-row gap-4 items-center w-full md:w-auto">
            <img class="rect-image w-full sm:w-20 md:h-20 rounded-xl" src="{{ asset($product->images[0]) }}"
              alt="{{ $product->name }} image">

            <div class="flex flex-col gap-1 text-left w-full">
              <h2 class="font-medium text-l md:text-xl">{{ $product->name }}</h2>

              <small class="text-darkGrey">
                <span class="font-medium">created / updated:</span>
                {{ $product->created_at->format('d.m.Y H:m') }} / {{ $product->updated_at->format('d.m.Y H:m') }}
              </small>

              <small class="text-darkGrey">
                {{ $product->subcategory->category->name }} - {{ $product->subcategory->name }}
              </small>
            </div>
            </div>
          </header>

          <div class="flex flex-row sm:flex-col md:flex-row w-full sm:w-auto gap-2 md:gap-4 text-center">
            <a class="btn-primary w-full md:w-auto py-4 sm:py-2 px-5 md:py-4 md:px-12 flex-1 md:flex-auto"
              href="{{ route('admin.product.show', [$product->id]) }}">edit</a>

            <form action="{{ route('admin.product.destroy', [$product->id]) }}" method="POST"
              class="col-span-1 flex items-center justify-end flex-1 md:flex-auto">
              @csrf
              @method('DELETE')

              <button class="btn-secondary w-full md:w-auto py-4 sm:py-2 px-5 md:py-4 md:px-6" type="submit">
                Remove
              </button>
            </form>
          </div>
        </article>
      @empty
        No products...
      @endforelse
    </section>
  </article>

@endsection
