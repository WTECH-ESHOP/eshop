@extends('layouts.app')

@section('title', 'Cart')

@section('content')

<x-cart.state />

<section class="w-1/2 mx-auto py-28">
	<div class="flex flex-col items-center gap-16">
		<img src="{{ asset('assets/icons/cart-done.svg') }}" alt="Cart done">

		<div class="flex flex-col gap-2 text-center">
			<h3>THANK YOU FOR YOUR ORDER</h3>
			<span class="text-lg">We've sent you an email with order information.</span>
		</div>

		<button class="btn-primary">track order</button>
	</div>
</section>

@endsection