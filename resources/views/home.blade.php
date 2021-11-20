@extends('layouts.app')

@section('title', 'Best supplements')

@section('top')
  <x-ui.slider />
@endsection

@section('content')

  <article>
    <header class="text-center font-medium mb-8">
      <h1 class="text-2xl leading-10 uppercase">Newest products</h1>
      <h2 class="text-darkGrey">lorem ipsum dolor sit</h2>
    </header>

    <section class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-8 gap-y-7">
      @foreach ($products as $product)
        <x-product :data="$product" />
      @endforeach
    </section>
  </article>

@endsection
