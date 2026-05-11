<div id="modal-change-action-category" class="modal fixed inset-0 flex items-start pt-10 justify-center bg-black/50 opacity-0 pointer-events-none transition-opacity duration-500" >
    <div class="w-lg bg-[#1C1A2E] rounded-lg transform scale-95 transition-all duration-300 modal-content">

        <div class="border-b-2 border-[#201E34] p-5 flex justify-between items-center">
            <h1 class="text-white text-2xl font-semibold">Atualizar status categoria</h1>

            <button data-action="closeModal" class="text-white hover:text-white/60 transition cursor-pointer"><i class="fa-solid fa-x "></i></button>
        </div>
        <form method="POST" action="{{ route('update.active.category') }}">
            @csrf
            @method('PATCH')

            <input type="hidden" name="id-category" id="id-category-modal-change-action-category" />
            <input type="hidden" name="active-category" id="active-category-modal-change-action-category" />

            <div class="gap-8 flex flex-col p-5">

                <p class="text-white">Tem certeza que deseja desativar a categoria de nome <b class="name-category-modal-change-action-category"></b> ? Essa ação não poderá ser desfeita!</p>

            </div>
            <div class="border-t-2 border-[#201E34] flex justify-end items-center p-5 gap-3">
                <button type="submit" id="btn-change-active-category" class="transition cursor-pointer  p-2 border border-[#363A3F] rounded-lg w-26  ">


                </button>

                <input type="button" value="Cancelar" data-action="closeModal"  class="text-white hover:text-white/70 transition cursor-pointer  p-2 border border-[#363A3F] rounded-lg  w-26 hover:bg-[#282541]"/>
            </div>
        </form>

    </div>
</div>


