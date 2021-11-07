@extends('layouts.app')

@section('title', 'Cart')

@section('content')

<x-cart.state />

<section class="w-1/2 mx-auto font-semibold uppercase pt-16 pb-8">
	<div class="grid grid-cols-3 gap-5">
		<div class="border border-black rounded-10p p-8 pb-10 flex flex-col gap-5 relative">
			<div class="flex flex-col">
				<span>John Doe</span>
				<span>0917 787 236</span>
			</div>
			<p class="font-normal normal-case">
				Janka Kráľa 1175/12<br>
				Partizánske, 958 06<br>
				Slovakia
			</p>
			<div class="absolute bottom-0 right-0 bg-black flex items-center justify-center w-80p h-40p rounded-br-10p rounded-tl-10p">
				<img class="w-20p" src="{{ asset('assets/icons/done.svg') }}" alt="done">
			</div>
		</div>
		
		<div class="border border-lightGrey hover:border-black rounded-10p p-8 pb-10 flex flex-col gap-5 transition-all relative">
			<div class="flex flex-col">
				<span>John Doe</span>
				<span>0917 787 236</span>
			</div>
			<p class="font-normal normal-case">
				Janka Kráľa 1175/12<br>
				Partizánske, 958 06<br>
				Slovakia
			</p>
			<div class="absolute bottom-0 right-0 border border-lightGrey flex items-center justify-center w-80p h-40p rounded-br-10p rounded-tl-10p">
				<span>select</span>
			</div>
		</div>
		
		<div class="border border-lightGrey hover:border-black rounded-10p p-8 flex flex-col gap-5 justify-center transition-all">
			<div class="flex flex-col gap-2 items-center justify-center">
				<div class="w-32p h-32p bg-black rounded-1/2 flex items-center justify-center">
					<img src="{{ asset('assets/icons/plus.svg') }}" alt="plus">
				</div>
				<span class="text-10p font-normal">New address</span>
			</div>
		</div>
	</div>
</section>

<x-cart.delivery />

<x-cart.payment />

<section class="w-1/2 mx-auto flex justify-between py-8">
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