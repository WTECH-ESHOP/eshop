<div class="flex items-center gap-2">
  @auth
    <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a href="#" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
    </form>
  @endauth
  @php
    $cart = Session::get('cart');
    // dd($cart);
  @endphp

  <button id="open-signin" class="w-48p h-48p bg-none flex items-center justify-center">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M12 0C5.376 0 0 5.376 0 12C0 18.624 5.376 24 12 24C18.624 24 24 18.624 24 12C24 5.376 18.624 0 12 0ZM12 3.6C13.992 3.6 15.6 5.208 15.6 7.2C15.6 9.192 13.992 10.8 12 10.8C10.008 10.8 8.4 9.192 8.4 7.2C8.4 5.208 10.008 3.6 12 3.6ZM12 20.64C9 20.64 6.348 19.104 4.8 16.776C4.836 14.388 9.6 13.08 12 13.08C14.388 13.08 19.164 14.388 19.2 16.776C17.652 19.104 15 20.64 12 20.64Z"
        fill="#161616" />
    </svg>
  </button>

  <a href="/cart" class="w-48p h-48p bg-none flex items-center justify-center relative">
    <div class="absolute top-1 right-1 bg-grey rounded-full w-16p h-16p flex items-center justify-center">
      <span class="text-9p font-semibold">0</span>
    </div>

    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M7.19733 19.2C5.87782 19.2 4.81021 20.28 4.81021 21.6C4.81021 22.92 5.87782 24 7.19733 24C8.51684 24 9.59644 22.92 9.59644 21.6C9.59644 20.28 8.51684 19.2 7.19733 19.2ZM1.19955 2.4H2.39911L6.71751 11.508L5.09811 14.436C4.22243 16.044 5.374 18 7.19733 18H20.3924C21.0522 18 21.592 17.46 21.592 16.8C21.592 16.14 21.0522 15.6 20.3924 15.6H7.19733L8.51684 13.2H17.4535C18.3532 13.2 19.1449 12.708 19.5527 11.964L23.8471 4.176C24.291 3.384 23.7152 2.4 22.8035 2.4H5.05012L4.24642 0.684C4.05449 0.264 3.62265 0 3.16682 0H1.19955C0.5398 0 0 0.54 0 1.2C0 1.86 0.5398 2.4 1.19955 2.4ZM19.1929 19.2C17.8734 19.2 16.8058 20.28 16.8058 21.6C16.8058 22.92 17.8734 24 19.1929 24C20.5124 24 21.592 22.92 21.592 21.6C21.592 20.28 20.5124 19.2 19.1929 19.2Z"
        fill="#161616" />
    </svg>
  </a>

  <label for="menu-expand" class="menu md:hidden flex flex-row items-center z-50">
    <svg width="42" height="42" viewBox="0 0 100 100">
      <path class="line line1"
        d="M20 29h60s14.499-.183 14.533 37.711c.01 11.27-3.567 14.96-9.274 14.958C79.552 81.668 75 74.999 75 74.999L25 25" />
      <path class="line line2" d="M20 50h60" />
      <path class="line line3"
        d="M20 71h60s14.499.183 14.533-37.711c.01-11.27-3.567-14.96-9.274-14.958-5.707.001-10.259 6.67-10.259 6.67L25 75" />
    </svg>
  </label>
</div>

<script>
  const openSigninModal = document.getElementById('open-signin')

  openSigninModal.addEventListener('click', () => {
    signinModal.style.display = 'flex'
  })
</script>
