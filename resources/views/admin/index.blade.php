@extends('layouts.admin')

@section('title', 'Products')

@section('content')

  @include('admin.partials.header')

  <article class="container mb-14">
    <header class="flex justify-between mb-6">
      <a class="btn-primary" href="{{ route('admin.product.show') }}">new product</a>

      @if ($products->hasPages())
        {{ $products->onEachSide(-1)->links() }}
      @endif
    </header>

    <section class="flex flex-col gap-4">
      @forelse ($products as $product)
        <article class="flex justify-between items-center gap-4">
          <header class="flex gap-4 items-center">
            <img class="rect-image w-20 h-20 rounded-xl" src="{{ $product->images[0] }}"
              alt="{{ $product->name }} image">

            <div class="flex flex-col gap-1">
              <h2 class="font-medium text-xl">{{ $product->name }}</h2>

              <small class="text-darkGrey">
                <span class="font-medium">created / updated:</span>
                {{ $product->created_at->format('d.m.Y') }} / {{ $product->updated_at->format('d.m.Y') }}
              </small>

              <small class="text-darkGrey">
                {{ $product->subcategory->category->name }} - {{ $product->subcategory->name }}
              </small>
            </div>
            </div>
          </header>

          <div class="flex gap-4">
            <a class="btn-primary" href="{{ route('admin.product.show', [$product->id]) }}">edit</a>

            <form action="{{ route('admin.product.destroy', [$product->id]) }}" method="POST"
              class="col-span-1 flex items-center justify-end">
              @csrf
              @method('DELETE')

              <button class="btn-secondary" type="submit">
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
