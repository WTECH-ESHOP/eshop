@extends('layouts.admin')

@section('title', 'Admin panel')

@section('content')

  @include('admin.partials.header')

  <div>
    <a href="{{ route('admin.product.show') }}">create</a>

    <section class="flex flex-col gap-2">
      @forelse ($products as $product)
        <article class="flex justify-between">
          <span>{{ $product->name }}</span>

          <a href="{{ route('admin.product.show', [$product->id]) }}">edit</a>

          <form action="{{ route('admin.product.destroy', [$product->id]) }}" method="POST"
            class="col-span-1 flex items-center justify-end">
            @csrf
            @method('DELETE')

            <button type="submit">
              Remove
            </button>
          </form>
        </article>
      @empty
        No products...
      @endforelse
    </section>

    @if ($products->hasPages())
      <footer class="">
        {{ $products->links() }}
      </footer>
    @endif
  </div>

@endsection
