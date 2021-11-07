<section class="bg-black bg-opacity-50 absolute w-full h-full flex items-center z-50 overflow-hidden">
    <div class="w-1/2 mx-auto bg-white p-10 rounded-10p relative">
        <div class="absolute top-5 right-5">
            <img src="{{ asset('assets/icons/x.svg') }}" alt="close">
        </div>
        <h2 class="text-center">Address</h2>

        <div class="py-6 flex flex-col gap-7">
            <div class="grid grid-cols-2 gap-5">
                <div class="flex flex-col">
                    <label class="text-10p" for="firstname">FIRST NAME *</label>
                    <input type="text" name="firstname" id="firstname">
                </div>
                <div class="flex flex-col">
                    <label class="text-10p" for="lastname">LAST NAME *</label>
                    <input type="text" name="lastname" id="lastname">
                </div>
            </div>

            <div class="flex flex-col">
                <label class="text-10p" for="firstname">PHONE NUMBER *</label>
                <input type="text" name="firstname" id="firstname">
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div class="flex flex-col">
                    <label class="text-10p" for="firstname">COUNTRY *</label>
                    <input type="text" name="firstname" id="firstname">
                </div>
                <div class="flex flex-col">
                    <label class="text-10p" for="lastname">CITY *</label>
                    <input type="text" name="lastname" id="lastname">
                </div>
            </div>

            <div class="flex flex-col">
                <label class="text-10p" for="firstname">ADDRESS *</label>
                <input type="text" name="firstname" id="firstname">
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div class="flex flex-col">
                    <label class="text-10p" for="firstname">POSTAL CODE *</label>
                    <input type="text" name="firstname" id="firstname">
                </div>
                <div class="flex gap-2 items-center justify-center">
                    <input type="checkbox" name="save" id="save">
                    <label class="text-10p" for="save">SAVE PERMANENTLY.</label>
                </div>
            </div>
        </div>

        <div class="flex justify-center gap-8 py-6">
            <button class="btn-secondary">cancel</button>
            <button class="btn-primary">save</button>
        </div>
    </div>
</section>