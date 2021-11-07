<footer>
  <div class="bg-grey px-6 py-10 min-h-200p flex flex-col rounded-t-xl">
    <div class="container flex justify-between items-center flex-grow">
      <p class="mt-auto text-xs font-medium leading-5">
        SK, Partizánske 958 06<br>
        Janka Kráľa 1754/12<br>
        +421 917 758 236
      </p>

      <div class="flex flex-col items-center gap-5">
        <x-ui.logo />

        <nav class="flex gap-1 font-medium text-xs uppercase">
          <a href="#">Contact</a>
          <span>|</span>
          <a href="#">Business condition</a>
          <span>|</span>
          <a href="#">Complaint</a>
        </nav>
      </div>

      <div class="flex justify-center items-center mt-auto -mr-3">
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
      <p class="text-white text-xs">Copyright © 2021 Name, All rights reserved</p>
    </div>
  </div>
</footer>