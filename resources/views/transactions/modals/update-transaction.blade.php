<div id="modal-update-transaction" class="modal fixed inset-0 flex items-center justify-center bg-black/50 opacity-0 pointer-events-none transition-opacity duration-500" >
    <div class="w-250 bg-[#1C1A2E] rounded-lg transform scale-95 transition-all duration-300 modal-content">

        <div class="border-b-2 border-[#201E34] p-5 flex justify-between items-center">
            <h1 class="text-white text-2xl font-semibold">Editar dados da transação</h1>

            <button data-action="closeModal" class="text-white hover:text-white/60 transition cursor-pointer"><i class="fa-solid fa-x "></i></button>
        </div>
                <form method="POST" action="{{ route('update.transaction') }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id-transaction" id="id-transaction-modal-update-transaction" />


            <div class="gap-8 flex flex-col p-5">

                <div class="flex flex-col text-white gap-2">
                    <label class="font-bold" for="update-category">Categoria</label>
                    <select name="category_update" id="update-category" required>
                        @if($categories->isEmpty())
                            <option value="" disabled selected>Sem categorias cadastradas</option>
                        @else
                            <option value="">Escolha a categoria...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif

                    </select>
                    @error('category_update')
                    <span class="text-md text-red-400">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="flex flex-col text-white gap-2">
                    <label class="font-bold" for="type_update">Tipo (Entrada/Saída)</label>
                    <div>
                        <input name="type_update" type="radio" value="INCOME" required/>

                        <label>Entrada</label>
                    </div>

                    <div>
                        <input name="type_update" type="radio" value="EXPENSE" required/>

                        <label>Saída</label>
                    </div>
                    @error('type_update')
                    <span class="text-md text-red-400">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="flex flex-col text-white gap-2">
                    <label class="font-bold" for="amount_update">Valor</label>
                    <input name="amount_update"  type="number" placeholder="Insira o valor da transação"  class="w-full border p-3 border-gray-600 rounded-xl" required/>

                    @error('amount_update')
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
