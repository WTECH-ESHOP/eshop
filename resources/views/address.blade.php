@extends('layouts.app')

@section('title', 'Home')

@section('content')

<x-ui.modal id="address-modal" title="Address">
  <x-modals.address />
</x-ui.modal>

@endsection