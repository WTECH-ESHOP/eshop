<section class="max-w-2xl mx-auto grid md:grid-cols-4 gap-5 uppercase mb-12">
  <input class="hidden" type="radio" id="online" name="payment" value="online" checked>
  <label for="online"
    class="border border-grey hover:border-black transition-all rounded-xl p-7 flex flex-col relative cursor-pointer overflow-hidden">
    <div class="flex flex-col items-center">
      <img class="w-55p h-55p rounded-xl mb-2.5" src="{{ asset('assets/images/placeholder.png') }}" alt="placeholder">

      <span class="text-10p font-medium">Online</span>
      <span class="text-8p leading-3">Free</span>
    </div>

    <div class="hidden absolute bottom-0 right-0 bg-black items-center justify-center px-3 py-2 rounded-tl-xl">
      <img class="w-3" src="{{ asset('assets/icons/done.svg') }}" alt="done">
    </div>
  </label>

  <input class="hidden" type="radio" id="bank_transfer" name="payment" value="bank_transfer">
  <label for="bank_transfer"
    class="border border-grey hover:border-black transition-all rounded-xl p-7 flex flex-col relative cursor-pointer overflow-hidden">
    <div class="flex flex-col items-center">
      <img class="w-55p h-55p rounded-xl mb-2.5" src="{{ asset('assets/images/placeholder.png') }}" alt="placeholder">

      <span class="text-10p font-medium">BANK TRANSFER</span>
      <span class="text-8p leading-3">Free</span>
    </div>

    <div class="hidden absolute bottom-0 right-0 bg-black items-center justify-center px-3 py-2 rounded-tl-xl">
      <img class="w-3" src="{{ asset('assets/icons/done.svg') }}" alt="done">
    </div>
  </label>

  <input class="hidden" type="radio" id="google_pay" name="payment" value="google_pay">
  <label for="google_pay"
    class="border border-grey hover:border-black transition-all rounded-xl p-7 flex flex-col relative cursor-pointer overflow-hidden">
    <div class="flex flex-col items-center">
      <img class="w-55p h-55p rounded-xl mb-2.5" src="{{ asset('assets/images/placeholder.png') }}" alt="placeholder">

      <span class="text-10p font-medium">GOOGLE PAY</span>
      <span class="text-8p leading-3">Free</span>
    </div>

    <div class="hidden absolute bottom-0 right-0 bg-black items-center justify-center px-3 py-2 rounded-tl-xl">
      <img class="w-3" src="{{ asset('assets/icons/done.svg') }}" alt="done">
    </div>
  </label>

  <input class="hidden" type="radio" id="cash_on_delivery" name="payment" value="cash_on_delivery">
  <label for="cash_on_delivery"
    class="border border-grey hover:border-black transition-all rounded-xl p-7 flex flex-col relative cursor-pointer overflow-hidden">
    <div class="flex flex-col items-center">
      <img class="w-55p h-55p rounded-xl mb-2.5" src="{{ asset('assets/images/placeholder.png') }}" alt="placeholder">

      <span class="text-10p font-medium">CASH ON DELIVERY</span>
      <span class="text-8p leading-3">1.00 €</span>
    </div>

    <div class="hidden absolute bottom-0 right-0 bg-black items-center justify-center px-3 py-2 rounded-tl-xl">
      <img class="w-3" src="{{ asset('assets/icons/done.svg') }}" alt="done">
    </div>
  </label>
</section>
