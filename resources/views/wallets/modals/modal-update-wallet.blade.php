<div id="modal-update-wallet" class="modal fixed inset-0 flex items-start pt-10 justify-center bg-black/50 opacity-0 pointer-events-none transition-opacity duration-500" >
    <div class="w-250 bg-[#1C1A2E] rounded-lg transform scale-95 transition-all duration-300 modal-content">

        <div class="border-b-2 border-[#201E34] p-5 flex justify-between items-center">
            <h1 class="text-white text-2xl font-semibold">Nova carteira</h1>

            <button data-action="closeModal" class="text-white hover:text-white/60 transition cursor-pointer"><i class="fa-solid fa-x "></i></button>
        </div>
        <form method="POST" action="{{ route('update.wallet')  }}">
            @csrf
            @method('PUT')

            <input type="hidden" id="id-wallet-modal-update-wallet" name="id-wallet" />

            <div class="gap-8 flex flex-col p-5">

                <div class="flex flex-col text-white gap-2">
                    <label class="font-bold" for="name_update">Nome</label>
                    <input name="name_update" type="text" placeholder="Insira o nome da carteira"  class="w-full border p-3 border-gray-600 rounded-xl" required/>

                    @error('name_update')
                    <span class="text-md text-red-400">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="flex flex-col text-white gap-2">
                    <label class="font-bold" for="balance_update">Saldo Inicial</label>
                    <input name="balance_update" type="number" placeholder="Insira o saldo inicial da carteira"  class="w-full border p-3 border-gray-600 rounded-xl" required/>

                    @error('balance_update')
                    <span class="text-md text-red-400">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="flex flex-col text-white gap-2">
                    <label class="font-bold" for="type_update">Tipo da carteira</label>
                    <select name="type_update" class="w-full border p-3 border-gray-600 rounded-xl" required>
                        <option value="" selected>Selecione o tipo da carteira</option>
                        <option value="BANK">Banco</option>
                        <option value="CASH">Dinheiro</option>
                        <option value="INVESTMENT">Investimentos</option>
                    </select>
                    @error('type_update')
                    <span class="text-md text-red-400">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                    @enderror
                </div>


            </div>
            <div class="border-t-2 border-[#201E34] flex justify-end items-center p-5 gap-3">
                <button type="submit" class="text-white hover:text-white/70 transition cursor-pointer bg-blue-700 p-2 border border-[#363A3F] rounded-lg w-26 hover:bg-[#282541]/40 ">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Editar

                </button>

                <input type="button" value="Cancelar" data-action="closeModal"  class="text-white hover:text-white/70 transition cursor-pointer  p-2 border border-[#363A3F] rounded-lg  w-26 hover:bg-[#282541]"/>
            </div>
        </form>

    </div>
</div>

