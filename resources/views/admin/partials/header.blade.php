<header>
  <nav>
    <div>
      {{-- logo --}}
      <a href="{{ route('home') }}">Shop</a>
      <a href="{{ route('admin') }}">Products</a>
      <a href="{{ route('admin.product.show') }}">Create</a>
    </div>

    Admin panel

    <div>
      {{ Auth::user()->email }}

      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf

        <button type="submit">
          logout
        </button>
      </form>
    </div>
  </nav>
</header>
