@extends('layouts.app')

@section('title', 'Cart')

@section('content')

<x-cart.state />

<section class="font-semibold uppercase py-16">
	<div class="grid grid-cols-7 border-b border-grey pb-3 text-darkGrey px-5">
		<div class="col-span-2">
			<span>product</span>
		</div>
		<div class="col-span-1 text-center">
			<span>variant</span>
		</div>
		<div class="col-span-1 text-center">
			<span>price</span>
		</div>
		<div class="col-span-1 text-center">
			<span>amount</span>
		</div>
		<div class="col-span-1 text-center">
			<span>cost</span>
		</div>
		<div class="col-span-1 text-center"></div>
	</div>

	<div>
		<div class="grid grid-cols-7 py-5 border-b border-grey px-5">
			<div class="col-span-2 flex gap-5 items-center">
				<img class="w-80p h-80p rounded-10p" src="{{ asset('assets/images/placeholder.png') }}" alt="Placeholder">
				<div>
					<p>Lorem ipsum dolor sit amet admur</p>
					<span class="text-xs italic font-normal lowercase">category</span>
				</div>
			</div>

			<div class="col-span-1 flex items-center justify-center">
				<span>select</span>
			</div>

			<div class="col-span-1 flex items-center justify-center">
				<span>15.80 €</span>
			</div>

			<div class="col-span-1 flex items-center justify-center">
				<span>select</span>
			</div>

			<div class="col-span-1 flex items-center justify-center">
				<span>31.60 €</span>
			</div>
			
			<div class="col-span-1 flex items-center justify-end">
				<img src="{{ asset('assets/icons/x.svg') }}" alt="remove">
			</div>
		</div>
		<div class="grid grid-cols-7 py-5 border-b border-grey px-5">
			<div class="col-span-2 flex gap-5 items-center">
				<img class="w-80p h-80p rounded-10p" src="{{ asset('assets/images/placeholder.png') }}" alt="Placeholder">
				<div>
					<p>Lorem ipsum dolor sit amet admur</p>
					<span class="text-xs italic font-normal lowercase">category</span>
				</div>
			</div>

			<div class="col-span-1 flex items-center justify-center">
				<span>select</span>
			</div>

			<div class="col-span-1 flex items-center justify-center">
				<span>15.80 €</span>
			</div>

			<div class="col-span-1 flex items-center justify-center">
				<span>select</span>
			</div>

			<div class="col-span-1 flex items-center justify-center">
				<span>31.60 €</span>
			</div>
			
			<div class="col-span-1 flex items-center justify-end">
				<img src="{{ asset('assets/icons/x.svg') }}" alt="remove">
			</div>
		</div>
	</div>

	<div class="flex justify-between pt-16 pb-8">
		<button class="btn-secondary">continue shopping</button>
		<div class="flex items-center gap-10">
			<div class="flex items-center gap-4">
				<span class="text-base text-darkGrey">total</span>
				<span class="text-2xl text-black">55.99 €</span>
			</div>
			<button class="btn-primary flex justify-center items-center gap-2">
				next
				<img src="{{ asset('assets/icons/right-arrow.svg') }}" alt="right arrow">
			</button>
		</div>
	</div>
</section>

@endsection