<header class="w-full bg-white mb-10 border-b border-grey">
  <div class="container flex flex-col md:flex-row justify-between items-center gap-0 md:gap-6 py-2 text-center">
    <nav
      class="order-2 md:order-1 flex uppercase font-medium text-xs md:-ml-5 flex-1 w-full md:w-auto justify-center md:justify-start">
      <a class="px-5 py-4" href="{{ route('home') }}">shop</a>
      <a class="px-5 py-4" href="{{ route('admin') }}">products</a>
      <a class="px-5 py-4" href="{{ route('admin.product.show') }}">create</a>
    </nav>

    <h1 class="order-1 md:order-2 font-medium uppercase justify-self-center w-full md:w-auto p-4 md:p-0">@yield('title')
    </h1>

    <div class="order-3 flex md:-mr-5 items-center justify-center md:justify-end flex-1 w-full md:w-auto">
      <small class="text-xs text-darkGrey">{{ Auth::user()->email }}</small>

      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf

        <button class="px-5 py-4 uppercase font-medium text-xs" type="submit">
          logout
        </button>
      </form>
    </div>
  </div>
</header>
