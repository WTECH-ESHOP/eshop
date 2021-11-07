@extends('layouts.app')

@section('title', 'Cart delivery')

@section('top')
<x-cart.state stage="2"/>
@endsection

@section('content')

<article class="max-w-2xl mx-auto font-medium mb-12">
	<section class="grid grid-cols-3 gap-5">
		<div class="border border-black rounded-xl p-8 pb-16 flex flex-col gap-5 relative overflow-hidden cursor-pointer">
			<div class="flex flex-col gap-1">
				<span>John Doe</span>
				<span>0917 787 236</span>
			</div>

			<p class="font-normal leading-6">
				Janka Kráľa 1175/12<br>
				Partizánske, 958 06<br>
				Slovakia
			</p>

			<button class="absolute bottom-0 right-0 bg-black px-8 flex items-center h-10 rounded-tl-xl">
				<img class="h-3" src="{{ asset('assets/icons/done.svg') }}" alt="done">
			</button>
		</div>

		<div
			class="border transition-all hover:border-black border-grey rounded-xl p-8 pb-16 flex flex-col gap-5 relative overflow-hidden cursor-pointer">
			<div class="flex flex-col gap-1">
				<span>John Doe</span>
				<span>0917 787 236</span>
			</div>

			<p class="font-normal leading-6">
				Janka Kráľa 1175/12<br>
				Partizánske, 958 06<br>
				Slovakia
			</p>

			<button class="absolute bottom-0 right-0 border-grey border-t border-l px-8 flex items-center h-10 rounded-tl-xl">
				<span class="text-xs font-medium tracking-wide">SELECT</span>
			</button>
		</div>

		<div
			class="border cursor-pointer border-grey hover:border-black rounded-xl p-8 flex flex-col gap-5 justify-center transition-all">
			<div class="flex flex-col gap-2 items-center justify-center">

				<div class="p-2.5 bg-black rounded-1/2 flex items-center justify-center">
					<img src="{{ asset('assets/icons/white-plus.svg') }}" alt="plus">
				</div>

				<span class="text-xs uppercase font-normal">New address</span>
			</div>
		</div>
	</section>
</article>

<x-cart.delivery />

<x-cart.payment />

<article class="max-w-2xl mx-auto flex justify-between">
	<a href="/cart" class="btn-secondary flex items-center justify-center gap-3">
		<img src="{{ asset('assets/icons/left-arrow.svg') }}" alt="left-arrow">
		back to cart
	</a>

	<a href="/cart/confirmation" class="btn-primary flex justify-center items-center gap-3">
		next
		<img src="{{ asset('assets/icons/right-arrow.svg') }}" alt="right arrow">
	</a>
</article>

@endsection