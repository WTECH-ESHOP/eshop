<footer>
  <div class="bg-grey px-6 py-10 min-h-200p flex flex-col rounded-t-xl">
    <div class="container flex flex-wrap justify-center md:justify-between items-center flex-grow gap-8 md:gap-0">
      <p class="order-2 md:order-1 mt-auto text-xs font-medium leading-5 text-center md:text-left">
        SK, Bratislava 958 06<br>
        Ilkovičova 2<br>
        +421 917 758 236
      </p>

      <div class="order-1 md:order-2 flex flex-col items-center gap-5">
        <x-ui.logo />

        <nav class="flex gap-1 font-medium text-xs uppercase">
          <a href="#">Contact</a>
          <span>|</span>
          <a href="#">Business condition</a>
          <span>|</span>
          <a href="#">Complaint</a>
        </nav>
      </div>

      <div class="order-3 flex justify-center items-center mt-auto -mr-3 w-full md:w-auto">
        <a class="w-48p h-48p flex items-center justify-center" href="#">
          <img src="{{ asset('assets/icons/fb.svg') }}" alt="fb">
        </a>

        <a class="w-48p h-48p flex items-center justify-center" href="#">
          <img src="{{ asset('assets/icons/ig.png') }}" alt="ig">
        </a>

        <a class="w-48p h-48p flex items-center justify-center" href="#">
          <img src="{{ asset('assets/icons/yt.png') }}" alt="yt">
        </a>
      </div>
    </div>
  </div>

  <div class="bg-black py-4">
    <div class="container text-center">
      <p class="text-white text-xs">Copyright © 2021 Best Supplements, All rights reserved</p>
    </div>
  </div>
</footer>
