@php
	$items = ['Proteins', 'Gainers', 'Creatine', 'Amino acids', 'Vitamins', 'Stimulants', 'Fat burners']
@endphp

<header class="bg-white">
	<div class="container flex flex-wrap justify-between py-8 items-center gap-5">
		<x-ui.logo />
		<x-ui.search class="hidden md:block"/>
		<x-ui.headerIcons />
	</div>
	<input type="checkbox" id="menu-expand" class="hidden">
	<div id="nav-items-wrapper" class="w-screen h-screen flex flex-col justify-center items-center fixed left-0 top-0 bg-white z-30 text-black font-bold gap-5 px-10">
		<x-ui.search />
		<div class="bg-black h-3p w-100p my-5"></div>
		@if (isset($items))
			@foreach ($items as $item)
				<a class="text-xl" href="#">{{ $item }}</a>
			@endforeach
		@endif
	</div>
</header>