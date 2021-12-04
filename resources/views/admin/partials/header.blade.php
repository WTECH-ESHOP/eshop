<header class="w-full bg-white mb-10 border-b border-grey">
  <nav class="container flex justify-between items-center gap-6 py-2">
    <div class="flex uppercase font-medium text-xs -ml-5 flex-1">
      <a class="px-5 py-4" href="{{ route('home') }}">shop</a>
      <a class="px-5 py-4" href="{{ route('admin') }}">products</a>
      <a class="px-5 py-4" href="{{ route('admin.product.show') }}">create</a>
    </div>

    <h1 class="font-medium uppercase justify-self-center">@yield('title')</h1>

    <div class="flex -mr-5 items-center justify-end flex-1">
      <small class="text-xs text-darkGrey">{{ Auth::user()->email }}</small>

      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf

        <button class="px-5 py-4 uppercase font-medium text-xs" type="submit">
          logout
        </button>
      </form>
    </div>
  </nav>
</header>
