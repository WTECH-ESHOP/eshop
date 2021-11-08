@extends('layouts.app')

@section('title', 'Home')

@section('content')

<x-ui.modal id="signup-modal" title="Sign Up" subtitle="Have an account? ">
  <x-slot name="button">
    <span id="signup-button" class="cursor-pointer font-medium">Sign in</span>
  </x-slot>

  <x-modals.signup />
</x-ui.modal>

@endsection