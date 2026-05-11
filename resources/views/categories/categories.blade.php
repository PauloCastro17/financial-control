<x-base-layout sub-pag-menu="categories">

    <main class="w-full ">


        <x-header pag-menu="Categorias"/>

        <!--SEARCH NAME-->
        <article class="w-full pl-7 mb-5 justify-between flex items-center">
            <div class="flex items-center relative   ">
                <i class="fa-brands fa-sistrix text-[#78778B] absolute left-2 text-2xl"></i>
                <form action="{{ route('site.categories') }}" method="GET">
                    <input type="text" name="search" value="{{ old('search', request('search')) }}"
                           placeholder="Procurar por nome"
                           class="text-xl w-96 p-3  rounded-xl bg-[#282541] border border-[#201E34] text-[#78778B] pl-12 "/>
                </form>
            </div>

            <button data-action="modal" data-modal-id="#modal-new-category"
                    class="bg-[#C8EE44] text-[#1B212D] mr-10 flex items-center p-4 rounded-lg gap-2 w-54 hover:bg-[#A0B84B] hover:text-[#1B212D] cursor-pointer transition">
                <i class="fa-solid fa-layer-group text-xl"></i>
                <p class="text-xl font-semibold">Criar categoria</p>
            </button>
        </article>


        @session('alert')
        <x-alert :message="session('alert.message')" :type="session('alert.type')"/>
        @endsession

        <section class=" max-w-[95%] ml-7 mb-5 flex justify-center items-center">


            <table class="table-fixed w-full mt-3 border-[#201E34] justify-center">
                <thead class="text-[#78778B] uppercase">
                <tr>
                    <th class="py-3 w-[30%] text-start">Nome da categoria</th>
                    <th class="py-3 w-[25%] text-start">Status</th>
                    <th class="py-3 w-[25%] text-start">Data da criação</th>
                    <th class="py-3 w-[25%] text-center">Ações</th>
                </tr>
                </thead>
                <tbody>

                @if(!$categories->isEmpty())
                    @foreach($categories as $category)
                        <tr>
                            <td class="text-start border-b border-[#201E34] py-4 text-white">
                                <div class="flex justify-start">
                                    <div class="flex items-center gap-2 justify-center">

                                        {{ $category->name }}
                                    </div>
                                </div>
                            </td>
                            <td class="text-start border-b border-[#201E34] py-4 ">
                                @if($category->active == 1)
                                    <span class="text-[#75b798]"><i class="fa-regular fa-circle-check"></i> Ativo</span>
                                @else
                                    <span class="text-[#ea868f]"><i class="fa-regular fa-circle-xmark"></i> Desativado</span>
                                @endif

                            <td class="text-start border-b border-[#201E34] py-4 ">
                                <p class="text-white">{{ $category->initial_date }}</p>
                                <p class="text-[#78778B]">às {{ $category->final_date }}</p>
                            </td>

                            <td class=" border-b border-[#201E34] py-4 text-center text-3xl">
                                <div class="flex justify-center items-center dropdown relative">
                                    <button data-action="dropdown"
                                            class="w-15  text-white text-center cursor-pointer p-1 rounded-lg hover:bg-[#1E1C30] hover:text-[#78778B] transition">
                                        <i class="fa-solid fa-ellipsis text-xl text-center"></i>
                                    </button>

                                    <div class="absolute left-38 z-30 top-9 bg-[#201E34] w-38  rounded-lg border border-[#282541] dropdown-menu hidden">
                                        <ul class="gap-3 flex flex-col text-start py-2">

                                            @if($category->active == 1)
                                                <li class="text-sm text-white hover:bg-[#78778B]/20  transition pl-2 py-1 cursor-pointer">
                                                    <a class="block w-full h-full" data-action="modal" data-id-category="{{ $category->id }}" data-name-category="{{ $category->name }}" data-action-category="2" data-modal-id="#modal-change-action-category">Desativar</a></li>
                                            @else
                                                <li class="text-sm text-white hover:bg-[#78778B]/20  transition pl-2 py-1 cursor-pointer">
                                                    <a class="block w-full h-full" data-action="modal" data-id-category="{{ $category->id }}" data-name-category="{{ $category->name }}"  data-action-category="1" data-modal-id="#modal-change-action-category">Ativar</a></li>
                                            @endif

                                            <li class="text-sm text-white hover:bg-[#78778B]/20  transition pl-2 py-1 cursor-pointer">
                                                <a class="block w-full h-full" data-action="modal" data-id-category="{{ $category->id }}" data-modal-id="#modal-update-category">Editar</a></li>

                                            <li><hr class="border-[#282541] border"></li>

                                            <li  class="text-sm text-[#E5363D] hover:bg-[#78778B]/20  transition pl-2 py-1 cursor-pointer">
                                                <a class="block w-full h-full" data-action="modal" data-id-category="{{ $category->id }}" data-name-category="{{ $category->name }}" data-modal-id="#modal-delete-category">Apagar</a></li>
                                        </ul>

                                        <hr class="border-[#282541] border-dashed">


                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td><span class="text-white text-lg">Nenhuma categoria cadastrada!</span></td>
                    </tr>
                @endif



                </tbody>
            </table>
        </section>

    </main>

    @include('categories.modals.new-category')
    @include('categories.modals.delete-category')
    @include('categories.modals.update-category')
    @include('categories.modals.change-active-category')

    @push('scripts')

        <script>
            document.addEventListener('DOMContentLoaded', () => {

                //FUNÇÂO MODAL DELETE
                const modalDeleteCategory = document.getElementById('modal-delete-category');
                modalDeleteCategory.addEventListener('openModal', (e) => {
                    const btn = e.detail.btn;

                    const name =  btn.dataset.nameCategory;
                    const id =  btn.dataset.idCategory;

                    document.querySelector('.name-category-modal-delete-category').textContent = name;
                    document.querySelector('#id-category-modal-delete-category').value = id;
                });

                //FUNÇÂO MODAL UPDATE
                const modalUpdateCategory = document.getElementById('modal-update-category');
                modalUpdateCategory.addEventListener('openModal', (e) => {
                    const btn = e.detail.btn;
                    const id =  btn.dataset.idCategory;

                    axios.get(`/categoria/editar/${id}`)
                        .then(response => {
                            const category = response.data.category;

                            document.querySelector('#id-category-modal-update-category').value = category.id;
                            document.querySelector('#name-modal-update-category').value = category.name;

                        })
                        .catch(error => {
                            console.error('Erro ao obter os dados da categoria:', error);
                        });

                });

                modalUpdateCategory.addEventListener('closeModal', () => {
                    setTimeout(() => {
                        document.querySelector('#id-category-modal-update-category').value = '';
                        document.querySelector('.name-category-modal-delete-category').value = '';
                    }, 500);

                });

                //FUNÇÂO MODAL UPDATE "ACTIVE" CATEGORIA
                const modalUpdateActiveCategory = document.getElementById('modal-change-action-category');
                modalUpdateActiveCategory.addEventListener('openModal', (e) => {
                    const btn = e.detail.btn;
                    const id =  btn.dataset.idCategory;
                    const action =  btn.dataset.actionCategory;

                    document.querySelector('.name-category-modal-change-action-category').textContent = btn.dataset.nameCategory;
                    document.querySelector('#id-category-modal-change-action-category').value = id;
                    document.querySelector('#active-category-modal-change-action-category').value = action;

                    const btnModal = document.querySelector('#btn-change-active-category');
                    if(action == 1) {
                        btnModal.textContent = 'Ativar';
                        btnModal.classList.add('bg-[#051B11]', 'text-[#75b798]', 'hover:text-[#75b798]/60', 'hover:text-[#75b798]/70');
                    }else{
                        btnModal.textContent = 'Desativar';
                        btnModal.classList.add('bg-[#2c0b0e]', 'text-[#ea868f]', 'hover:bg-[#2c0b0e]/60', 'hover:text-[#ea868f]/70');
                    }

                });


            });


        </script>
    @endpush

</x-base-layout>




