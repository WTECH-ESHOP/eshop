@extends('layouts.app')

@section('title', 'Cart')

@section('content')

<x-cart.state />

<section class="w-3/4 mx-auto pt-16 pb-4">
	<div class="grid grid-cols-2 gap-12">
		<div>
			<div class="flex flex-col gap-8">
				<div class="flex items-start gap-5">
					<img src="{{ asset('assets/icons/avatar.svg') }}" alt="avatar">
					<div class="flex flex-col">
						<span class="font-semibold">John Doe</span>
						<span>johndoe@gmail.com</span>
						<span>0917 787 236</span>
					</div>
				</div>
			
				<div class="flex items-start gap-5">
					<img src="{{ asset('assets/icons/gps.svg') }}" alt="gps">
					<div class="flex flex-col">
						<span>Janka Kráľa 1175/12</span>
						<span>Partizánske, 958 06</span>
						<span>Slovakia</span>
					</div>
				</div>
			
				<div class="flex items-start gap-5">
					<img src="{{ asset('assets/icons/delivery.svg') }}" alt="delivery">
					<div class="flex flex-col">
						<span>Delivery by GLS courier</span>
						<span class="font-semibold">1.99 €</span>
					</div>
				</div>
			
				<div class="flex items-start gap-5">
					<img src="{{ asset('assets/icons/cash.svg') }}" alt="cash">
					<div class="flex flex-col">
						<span>Online</span>
						<span class="font-semibold">Free</span>
					</div>
				</div>
			</div>

			<div class="flex flex-col mt-10">
				<label class="text-10p text-darkGrey" for="comment">COMMENT</label>
				<textarea class="border border-grey rounded-10p h-100p" name="comment" id="comment"></textarea>
				<div class="flex gap-2 mt-6">
					<input type="checkbox" name="terms" id="terms">
					<label for="terms">I AGREE TO THE TERMS AND CONDITIONS AND PRIVACY POLICY.</label>
				</div>
			</div>
		</div>

		<div class="font-semibold">
			<span class="text-darkGrey">CART OVERVIEW</span>

			<div class="border-t border-grey mt-3">
				<div class="grid grid-cols-3 py-5 border-b border-grey px-5">
					<div class="col-span-2 flex gap-5 items-center">
						<img class="w-80p h-80p rounded-10p" src="{{ asset('assets/images/placeholder.png') }}" alt="Placeholder">
						<div>
							<p>Lorem ipsum dolor sit amet admur</p>
							<span class="text-xs italic font-normal lowercase">2 pcs - strawbery - 2000g</span>
						</div>
					</div>
					<div class="col-span-1 flex items-center justify-center">
						<span>31.60 €</span>
					</div>
				</div>
				<div class="grid grid-cols-3 py-5 border-b border-grey px-5">
					<div class="col-span-2 flex gap-5 items-center">
						<img class="w-80p h-80p rounded-10p" src="{{ asset('assets/images/placeholder.png') }}" alt="Placeholder">
						<div>
							<p>Lorem ipsum dolor sit amet admur</p>
							<span class="text-xs italic font-normal lowercase">2 pcs - strawbery - 2000g</span>
						</div>
					</div>
					<div class="col-span-1 flex items-center justify-center">
						<span>31.60 €</span>
					</div>
				</div>
			</div>

			<div class="flex items-center gap-4 justify-end mt-5">
				<span class="text-base text-darkGrey">total</span>
				<span class="text-2xl text-black">55.99 €</span>
			</div>
		</div>
	</div>
</section>

<section class="w-3/4 mx-auto flex justify-between pt-16 pb-8">
	<button class="btn-secondary flex items-center justify-center gap-2">
		<img src="{{ asset('assets/icons/left-arrow.svg') }}" alt="left-arrow">
		back to delivery & payment
	</button>
	<div class="flex items-center gap-10 font-semibold uppercase">
		<div class="flex items-center gap-4">
			<span class="text-base text-darkGrey">total</span>
			<span class="text-2xl text-black">55.99 €</span>
		</div>
		<button class="btn-primary flex justify-center items-center gap-2">
			confirm order
			<img src="{{ asset('assets/icons/right-arrow.svg') }}" alt="right arrow">
		</button>
	</div>
</section>

@endsection