@php
	isset($stage) ? $stage = $stage : $stage = null;
@endphp

<div class="bg-grey flex flex-col items-center pt-10 pb-14">
	<div class="w-2/5">
		<div class="flex w-full items-center">
			<div class="relative">
				<div class="border-darkGrey {{ $stage >= 1 ? 'bg-black' : 'border-3 border-black' }} w-24p h-24p rounded-1/2 flex justify-center items-center">
					@if ($stage >= 1)
					<img src="{{ asset('assets/icons/done.svg') }}" alt="done">
					@endif
				</div>
				<span
					class="absolute -bottom-2 left-1/2 transform translate-y-full -translate-x-1/2 uppercase font-semibold whitespace-nowrap">cart</span>
			</div>

			<div class="{{ $stage >= 1 ? 'bg-black' : 'bg-darkGrey' }} flex-grow w-auto h-3p"></div>

			<div class="relative">
				<div class="border-darkGrey {{ $stage >= 2 ? 'bg-black' : 'border-3' }} {{ $stage == 1 ? 'border-black' : '' }} w-24p h-24p rounded-1/2 flex justify-center items-center">
					@if ($stage >= 2)
					<img src="{{ asset('assets/icons/done.svg') }}" alt="done">
					@endif
				</div>
				<span
					class="absolute -bottom-2 left-1/2 transform translate-y-full -translate-x-1/2 uppercase font-semibold whitespace-nowrap">delivery
					& payment</span>
			</div>

			<div class="{{ $stage > 2 ? 'bg-black' : 'bg-darkGrey' }} flex-grow w-auto h-3p"></div>

			<div class="relative">
				<div class="border-darkGrey {{ $stage >= 3 ? 'bg-black' : 'border-3 border-black' }} w-24p h-24p rounded-1/2 flex justify-center items-center">
					@if ($stage >= 3)
					<img src="{{ asset('assets/icons/done.svg') }}" alt="done">
					@endif
				</div>
				<span class="absolute -bottom-2 left-1/2 transform translate-y-full -translate-x-1/2 uppercase font-semibold whitespace-nowrap">confirmation</span>
			</div>
		</div>
	</div>
</div>