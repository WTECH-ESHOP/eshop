@extends('layouts.app')

@section('title', 'Home')

@section('content')

<x-ui.modal id="signin-modal" title="Sign In" subtitle="Don’t have an account? ">
    <x-slot name="button">
      <span id="signin-button" class="cursor-pointer font-medium">Sign up</span>
    </x-slot>

    <x-modals.signin />
  </x-ui.modal>

@endsection