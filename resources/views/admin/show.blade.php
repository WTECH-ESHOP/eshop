@extends('layouts.admin')

@section('title', 'Admin create/edit')

@section('content')

  @include('admin.partials.header')

  <form method="POST" action="{{ route('admin.product.store') }}">
    <x-ui.input name="name" label="name" type="text" :value="$data->name ?? ''" required />
    @error('name')<span class="error">{{ $message }}</span>@enderror

    {{-- category, subcategory double select --}}

    <x-ui.input name="description" label="description" type="text" :value="$data->description ?? ''" required />
    @error('description')<span class="error">{{ $message }}</span>@enderror

    {{-- images picker --}}

    {{-- units select --}}

    {{-- information textarea --}}

    {{-- brand select --}}

    {{-- add variant + add quantities --}}

  </form>

@endsection
