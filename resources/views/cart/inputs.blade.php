@extends('layouts.app')

@section('title', 'Cart')

@section('content')

<x-cart.state />

<section class="w-1/2 mx-auto font-semibold uppercase pt-8 pb-4">
	<div class="py-6 flex flex-col gap-7">
		<div class="grid grid-cols-2 gap-5">
			<div class="flex flex-col">
				<label class="text-10p" for="firstname">FIRST NAME *</label>
				<input type="text" name="firstname" id="firstname">
			</div>
			<div class="flex flex-col">
				<label class="text-10p" for="lastname">LAST NAME *</label>
				<input type="text" name="lastname" id="lastname">
			</div>
		</div>

		<div class="flex flex-col">
			<label class="text-10p" for="firstname">PHONE NUMBER *</label>
			<input type="text" name="firstname" id="firstname">
		</div>

		<div class="grid grid-cols-2 gap-5">
			<div class="flex flex-col">
				<label class="text-10p" for="firstname">COUNTRY *</label>
				<input type="text" name="firstname" id="firstname">
			</div>
			<div class="flex flex-col">
				<label class="text-10p" for="lastname">CITY *</label>
				<input type="text" name="lastname" id="lastname">
			</div>
		</div>

		<div class="flex flex-col">
			<label class="text-10p" for="firstname">ADDRESS *</label>
			<input type="text" name="firstname" id="firstname">
		</div>

		<div class="grid grid-cols-2 gap-5">
			<div class="flex flex-col">
				<label class="text-10p" for="firstname">POSTAL CODE *</label>
				<input type="text" name="firstname" id="firstname">
			</div>
		</div>
	</div>
</section>

<x-cart.delivery />

<x-cart.payment />

<section class="w-1/2 mx-auto flex justify-between pt-16 pb-8">
	<button class="btn-secondary flex items-center justify-center gap-2">
		<img src="{{ asset('assets/icons/left-arrow.svg') }}" alt="left-arrow">
		back to cart
	</button>
	<button class="btn-primary flex justify-center items-center gap-2">
		next
		<img src="{{ asset('assets/icons/right-arrow.svg') }}" alt="right arrow">
	</button>
</section>

@endsection