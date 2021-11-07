@extends('layouts.app')

@section('title', 'Cart')

@section('top')
@php
	$stage = 3;
@endphp
<x-cart.state :stage="$stage"/>
@endsection

@section('content')

<section class="w-1/2 mx-auto py-8">
	<div class="flex flex-col items-center gap-14">
		<img src="{{ asset('assets/icons/cart-done.svg') }}" alt="Cart done">

		<div class="flex flex-col gap-2 text-center">
			<h3 class="font-medium text-2xl uppercase">thank you for yout order</h3>
			<span class="text-lg text-darkGrey">We've sent you an email with order information.</span>
		</div>

		<button class="btn-primary">track order</button>
	</div>
</section>

@endsection