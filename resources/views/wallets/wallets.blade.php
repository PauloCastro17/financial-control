<x-base-layout sub-pag-menu="wallets">

    <main class="w-full ">


        <x-header pag-menu="Carteiras"/>

        <!--SEARCH NAME-->
        <article class="w-full pl-7 mb-5 justify-between flex items-center">
            <div class="flex items-center relative   ">
                <i class="fa-brands fa-sistrix text-[#78778B] absolute left-2 text-2xl"></i>
                <form action="{{ route('site.wallets') }}" method="GET">
                    <input type="text" name="search" value="{{ old('search', request('search')) }}"
                           placeholder="Procurar por nome"
                           class="text-xl w-96 p-3  rounded-xl bg-[#282541] border border-[#201E34] text-[#78778B] pl-12 "/>
                </form>
            </div>

            <button data-action="modal" data-modal-id="#modal-new-wallet"
                    class="bg-[#C8EE44] text-[#1B212D] mr-10 flex items-center p-4 rounded-lg gap-2 w-54 hover:bg-[#A0B84B] hover:text-[#1B212D] cursor-pointer transition">
                <i class="fa-solid fa-wallet text-xl"></i>
                <p class="text-xl font-semibold">Criar carteira</p>
            </button>
        </article>


        @session('alert')
            <x-alert :message="session('alert.message')" :type="session('alert.type')"/>
        @endsession

        <section class=" max-w-[95%] ml-7 mb-5 flex justify-center items-center">


            <table class="table-fixed w-full mt-3 border-[#201E34] justify-center">
                <thead class="text-[#78778B] uppercase">
                <tr>
                    <th class="py-3 w-[30%] text-start">Nome da carteira</th>
                    <th class="py-3 w-[25%] text-start">Tipo</th>
                    <th class="py-3 w-[25%] text-start">Saldo</th>
                    <th class="py-3 w-[25%] text-start">Data da criação</th>
                    <th class="py-3 w-[25%] text-center">Ações</th>
                </tr>
                </thead>
                <tbody>

                @if(!$wallets->isEmpty())
                    @foreach($wallets as $wallet)
                        <tr>
                            <td class="text-start border-b border-[#201E34] py-4 text-white">
                                <div class="flex justify-start">
                                    <div class="flex items-center gap-2 justify-center">
                                        {{ $wallet->name }}
                                    </div>
                                </div>
                            </td>
                            <td class="text-start border-b border-[#201E34] py-4 text-[#78778B]">{{ $wallet->type_different }}</td>
                            <td class="text-start border-b border-[#201E34] py-4 text-white">R$ {{ number_format($wallet->balance, 2, ',', '.') }}</td>

                            <td class="text-start border-b border-[#201E34] py-4 ">
                                <p class="text-white">{{ $wallet->initial_date }}</p>
                                <p class="text-[#78778B]">às {{ $wallet->final_date }}</p>
                            </td>

                            <td class=" border-b border-[#201E34] py-4 text-center text-3xl">
                                <div class="flex justify-center items-center dropdown relative">
                                    <button data-action="dropdown"
                                            class="w-15  text-white text-center cursor-pointer p-1 rounded-lg hover:bg-[#1E1C30] hover:text-[#78778B] transition">
                                        <i class="fa-solid fa-ellipsis text-xl text-center"></i>
                                    </button>

                                    <div class="absolute left-38 z-30 top-9 bg-[#201E34] w-38  rounded-lg border border-[#282541] dropdown-menu hidden">
                                        <ul class="gap-3 flex flex-col text-start py-2">


                                            <li class="text-sm text-white hover:bg-[#78778B]/20  transition pl-2 py-1 cursor-pointer">
                                                <a class="block w-full h-full" data-action="modal" data-id-wallet="{{ $wallet->id }}" data-modal-id="#modal-update-wallet">Editar</a></li>

                                            <li><hr class="border-[#282541] border"></li>

                                            <li  class="text-sm text-[#E5363D] hover:bg-[#78778B]/20  transition pl-2 py-1 cursor-pointer">
                                                <a class="block w-full h-full" data-action="modal" data-id-wallet="{{ $wallet->id }}" data-name-wallet="{{ $wallet->name }}" data-modal-id="#modal-delete-wallet">Apagar</a></li>
                                        </ul>

                                        <hr class="border-[#282541] border-dashed">


                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td><span class="text-white text-lg">Nenhuma carteira cadastrada!</span></td>
                    </tr>
                @endif



                </tbody>
            </table>
        </section>

    </main>

    @include('wallets.modals.modal-new-wallet')
    @include('wallets.modals.delete-wallet')
    @include('wallets.modals.modal-update-wallet')
    @push('scripts')

        <script>
            document.addEventListener('DOMContentLoaded', () => {

                //FUNÇÂO MODAL DELETE
                const modalDeleteWallet = document.getElementById('modal-delete-wallet');
                modalDeleteWallet.addEventListener('openModal', (e) => {
                    const btn = e.detail.btn;

                    const name =  btn.dataset.nameWallet;
                    const id =  btn.dataset.idWallet;

                    document.querySelector('.name-wallet-modal-delete-wallet').textContent = name;
                    document.querySelector('#id-wallet-modal-delete-wallet').value = id;
                });

                //FUNÇÂO MODAL UPDATE
                const modalUpdateWallet = document.getElementById('modal-update-wallet');
                modalUpdateWallet.addEventListener('openModal', (e) => {
                    const btn = e.detail.btn;
                    const id =  btn.dataset.idWallet;

                    axios.get(`/carteiras/editar/${id}`)
                        .then(response => {
                            const wallet = response.data.wallet;

                            document.querySelector('#id-wallet-modal-update-wallet').value = wallet.id;
                            document.querySelector('input[name="name_update"]').value = wallet.name;
                            document.querySelector('input[name="balance_update"]').value = wallet.balance;
                            document.querySelector('select[name="type_update"]').value = wallet.type;

                        })
                        .catch(error => {
                            console.error('Erro ao obter os dados da carteira:', error);
                        });

                });

                modalUpdateWallet.addEventListener('closeModal', () => {
                    setTimeout(() => {
                        document.querySelector('#id-wallet-modal-update-wallet').value = '';
                        document.querySelector('input[name="name_update"]').value = '';
                        document.querySelector('input[name="balance_update"]').value = '';
                        document.querySelector('select[name="type_update"]').value = '';
                    }, 500);

                });



            });


        </script>
    @endpush

</x-base-layout>




