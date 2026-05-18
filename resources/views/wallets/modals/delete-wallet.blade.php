<div id="modal-delete-wallet" class="modal fixed inset-0 flex items-start pt-10 justify-center bg-black/50 opacity-0 pointer-events-none transition-opacity duration-500" >
    <div class="w-lg bg-[#1C1A2E] rounded-lg transform scale-95 transition-all duration-300 modal-content">

        <div class="border-b-2 border-[#201E34] p-5 flex justify-between items-center">
            <h1 class="text-white text-2xl font-semibold">Deletar carteira</h1>

            <button data-action="closeModal" class="text-white hover:text-white/60 transition cursor-pointer"><i class="fa-solid fa-x "></i></button>
        </div>
        <form method="POST" action="">
            @csrf
            @method('DELETE')

            <input type="hidden" name="id-wallet" id="id-wallet-modal-delete-wallet" />

            <div class="gap-8 flex flex-col p-5">

                <p class="text-white">Tem certeza que deseja apagar a carteira de nome <b class="name-wallet-modal-delete-wallet"></b>? Essa ação não poderá ser desfeita!</p>

            </div>
            <div class="border-t-2 border-[#201E34] flex justify-end items-center p-5 gap-3">
                <button type="submit" class="text-white hover:text-white/70 transition cursor-pointer bg-[#bb2d3b] p-2 border border-[#363A3F] rounded-lg w-26 hover:bg-[#bb2d3b]/40 ">
                    <i class="fa-solid fa-trash"></i>
                    Apagar

                </button>

                <input type="button" value="Cancelar" data-action="closeModal"  class="text-white hover:text-white/70 transition cursor-pointer  p-2 border border-[#363A3F] rounded-lg  w-26 hover:bg-[#282541]"/>
            </div>
        </form>

    </div>
</div>


