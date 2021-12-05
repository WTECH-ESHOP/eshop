@extends('layouts.admin')

@section('title', 'Admin create / edit')

@section('content')

  @include('admin.partials.header')

  <section class="container mb-14">
    <form method="POST" action="{{ route('admin.product.store', [$data ? $data->id : null]) }}"
      class="w-1/2 mx-auto border relative flex flex-col items-center gap-4 py-12 px-8 md:px-16 text-center bg-white rounded-xl">
      @csrf

      {{-- name --}}
      <x-ui.input name="name" label="name" type="text" :value="$data->name ?? ''" required />
      @error('name')<span class="error">{{ $message }}</span>@enderror

      <div class="flex gap-4 w-full">
        {{-- category --}}
        <div class="flex flex-col gap-1 w-full text-left flex-1">
          <label class="text-darkGrey uppercase text-xs tracking-wide" for="category">category *</label>

          <select id="category" name="category" class="border capitalize cursor-pointer" required>
            @php
              $selectedCategory = old('category') ?? ($data ? $data->subcategory->category->id : '');
            @endphp

            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>
        @error('category')<span class="error">{{ $message }}</span>@enderror

        {{-- subcategory --}}
        <div class="flex flex-col gap-1 w-full text-left flex-1">
          <label class="text-darkGrey uppercase text-xs tracking-wide" for="subcategory">subcategory *</label>

          <select id="subcategory" name="subcategory" class="border capitalize cursor-pointer" required>
            @php
              $selectedSubcategory = old('subcategory') ?? ($data ? $data->subcategory->id : '');
              $id = $data ? $data->subcategory->category->id : $categories[0]->id;
              $selected = $categories->firstWhere('id', $id);
            @endphp

            @foreach ($selected->subcategories as $subcategory)
              <option value="{{ $subcategory->id }}" {{ $selectedSubcategory == $subcategory->id ? 'selected' : '' }}>
                {{ $subcategory->name }}
              </option>
            @endforeach
          </select>
        </div>
        @error('subcategory')<span class="error">{{ $message }}</span>@enderror
      </div>

      {{-- description --}}
      <div class="relative flex flex-col gap-1 text-left w-full">
        <label class="text-darkGrey tracking-wide text-xs uppercase" for="description">description *</label>

        <textarea class="border border-grey rounded-10p h-100p p-5" name="description" id="description"
          required>{{ old('description') ?? ($data ? $data->description : '') }}</textarea>
      </div>
      @error('description')<span class="error">{{ $message }}</span>@enderror

      {{-- images --}}
      <div class="flex flex-col gap-1 w-full text-left flex-1">
        <label class="text-darkGrey uppercase text-xs tracking-wide" for="unit">images *</label>

        <input type="hidden" name="default_images" id="defaultImages"
          value="{{ $data ? join(',', $data->images) : null }}" />
        <input type="file" name="images" id="images" class="filepond" required multiple />
        <div id="csrf-token" class="hidden">{{ csrf_token() }}</div>
      </div>
      @error('images')<span class="error">{{ $message }}</span>@enderror

      <div class="flex gap-4 w-full">
        {{-- unit --}}
        <div class="flex flex-col gap-1 w-full text-left flex-1">
          <label class="text-darkGrey uppercase text-xs tracking-wide" for="unit">units *</label>

          <select id="unit" name="unit" class="border capitalize cursor-pointer" required>
            @php
              $selectedUnit = old('unit') ?? ($data ? $data->unit : '');
            @endphp

            <option value="G" {{ $selectedUnit == 'G' ? 'selected' : '' }}>Grams</option>
            <option value="KS" {{ $selectedUnit == 'KS' ? 'selected' : '' }}>Pieces</option>
          </select>
        </div>
        @error('unit')<span class="error">{{ $message }}</span>@enderror

        {{-- brand --}}
        <div class="flex flex-col gap-1 w-full text-left flex-1">
          <label class="text-darkGrey uppercase text-xs tracking-wide" for="brand">brand *</label>

          <select id="brand" name="brand" class="border capitalize cursor-pointer" required>
            @php
              $selectedBrand = old('brand') ?? ($data ? $data->brand : '');
            @endphp

            @foreach ($brands as $brand)
              <option value="{{ $brand }}" {{ $selectedBrand == $brand ? 'selected' : '' }}>
                {{ str_replace('_', ' ', $brand) }}
              </option>
            @endforeach
          </select>
        </div>
        @error('brand')<span class="error">{{ $message }}</span>@enderror
      </div>

      {{-- add variant + add quantities --}}

      {{-- information --}}
      <div class="relative flex flex-col gap-1 text-left w-full">
        <label class="text-darkGrey tracking-wide text-xs uppercase" for="information">information *</label>

        <textarea class="border border-grey rounded-10p p-5 h-96" name="information" id="information"
          required>{{ old('information') ?? ($data ? $data->information : '') }}</textarea>
      </div>
      @error('information')<span class="error">{{ $message }}</span>@enderror

      <div class="flex gap-4 justify-center">
        <a href="{{ route('admin') }}" class="btn-secondary mt-6 w-1/2 md:w-auto md:self-center">cancel</a>
        <button type="submit" class="btn-primary mt-6 w-1/2 md:w-auto md:self-center">save</button>
      </div>
    </form>
  </section>

  <script>
    const categories = <?= $categories ?>;
    const category = document.getElementById('category')
    const subcategory = document.getElementById('subcategory')

    category?.addEventListener('change', (e) => {
      let value = e.target.value
      let selected = categories?.find((item) => item?.id == value)

      subcategory.innerHTML = ''
      selected?.subcategories?.forEach((item) => {
        let option = document.createElement('option');
        option.text = item?.name;
        option.value = item?.id;
        subcategory?.add(option);
      })
    })
  </script>


@endsection
