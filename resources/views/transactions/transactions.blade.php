<x-base-layout sub-pag-menu="transactions">

    <main class="w-full ">


        <x-header pag-menu="Transações"/>

        <!--SEARCH NAME-->
        <article class="w-full pl-7 mb-5 justify-between flex items-center">
            <div class="flex items-center relative   ">
                <i class="fa-brands fa-sistrix text-[#78778B] absolute left-2 text-2xl"></i>
                <form action="{{ route('site.transactions') }}" method="GET">
                    <input type="text" name="search" value="{{ old('search', request('search')) }}"
                           placeholder="Procurar por nome"
                           class="text-xl w-96 p-3  rounded-xl bg-[#282541] border border-[#201E34] text-[#78778B] pl-12 "/>
                </form>
            </div>

            <div class="flex gap-2 mr-5">
                <button data-action="modal" data-modal-id="#modal-new-transaction"
                        class="bg-[#C8EE44] text-[#1B212D]  flex items-center p-3 rounded-lg gap-2 w-46 hover:bg-[#A0B84B] hover:text-[#1B212D] cursor-pointer transition">
                    <i class="fa-solid fa-money-check-dollar text-lg"></i>
                    <p class="font-semibold text-lg">Criar transação</p>
                </button>

                <button data-action="modal" data-modal-id="#modal-new-transaction"
                        class="border border-[#C8EE44] text-white  flex items-center p-3 rounded-lg gap-2 w-46 hover:bg-[#A0B84B] hover:text-[#1B212D]  cursor-pointer transition">
                    <i class="fa-solid fa-file-import text-lg"></i>
                    <p class="font-semibold text-lg">Importar CSV</p>
                </button>

            </div>
        </article>


        @session('alert')
        <x-alert :message="session('alert.message')" :type="session('alert.type')"/>
        @endsession


        <section class=" max-w-[95%] ml-7 mb-5 flex justify-center items-center">


            <table class="table-fixed w-full mt-3 border-[#201E34] justify-center">
                <thead class="text-[#78778B] uppercase">
                <tr>
                    <th class="py-3 w-[35%] text-start">Nome da transação</th>
                    <th class="py-3 w-[20%] text-start">Carteira</th>
                    <th class="py-3 w-[20%] text-start">Tipo</th>
                    <th class="py-3 w-[20%] text-start">Valor</th>
                    <th class="py-3 w-[20%] text-start">Status</th>
                    <th class="py-3 w-[25%] text-start">Data da transação</th>
                    <th class="py-3 w-[20%] text-center">Ações</th>
                </tr>
                </thead>
                <tbody>

                @if(!$transactions->isEmpty())
                    @foreach($transactions as $transaction)
                        <tr>
                            <td class="text-start border-b border-[#201E34] py-4 text-white">
                                <div class="flex justify-start">
                                    <div class="flex items-center gap-2 justify-center">
                                <span class="w-10 h-10 rounded-lg bg-[#292642] flex items-center justify-center">
                                    <i class="fa-solid text-xl {{ $transaction->type_color_transaction }} fa-money-bill-transfer"></i>
                                </span>
                                        {{ $transaction->category->name }}
                                    </div>
                                </div>
                            </td>
                            <td class="text-start border-b border-[#201E34] py-4 ">
                                <p class="text-[#78778B]">{{ $transaction->wallet->name }}</p>
                            </td>
                            <td class="text-start border-b border-[#201E34] py-4 text-white">{{ $transaction->type_transaction }}</td>
                            <td class="text-start border-b border-[#201E34] py-4 text-[#78778B]">
                                R$ {{ number_format($transaction->amount, 2, ',', '.') }}</td>
                            <td class="text-start border-b border-[#201E34] py-4 ">
                                <div class="w-[60%] p-3 rounded-lg text-center font-medium {{ $transaction->status_color_transaction }}">
                                    {{ $transaction->status_transaction_translate }}
                                </div>
                            </td>
                            <td class="text-start border-b border-[#201E34] py-4 ">
                                @if(!is_null($transaction->transaction_date ))
                                    <p class="text-white">{{ $transaction->initial_date }}</p>
                                    <p class="text-[#78778B]">às {{ $transaction->final_date }}</p>
                                @else
                                    <p class="text-white">Pagamento pendente!</p>
                                @endif
                            </td>
                            <td class=" border-b border-[#201E34] py-4 text-center text-3xl">
                                <div class="flex justify-center items-center dropdown relative">
                                    <button data-action="dropdown"
                                            class="w-15  text-white text-center cursor-pointer p-1 rounded-lg hover:bg-[#1E1C30] hover:text-[#78778B] transition">
                                        <i class="fa-solid fa-ellipsis text-xl text-center"></i>
                                    </button>

                                    <div class="absolute left-15 z-30 top-9 bg-[#201E34] w-38  rounded-lg border border-[#282541] dropdown-menu hidden">
                                        <ul class="gap-3 flex flex-col text-start py-2">
                                            @if($transaction->status_transaction === "PENDING")
                                                <li class="text-sm text-white hover:bg-[#78778B]/20  transition pl-2 py-1 cursor-pointer">
                                                    <a class="block w-full h-full" data-action="modal" data-id-transaction="{{ $transaction->id }}" data-modal-id="#modal-update-payment-transaction">Atualizar pagamento</a>
                                                </li>
                                            @endif
                                            <li class="text-sm text-white hover:bg-[#78778B]/20  transition pl-2 py-1 cursor-pointer">
                                                <a class="block w-full h-full" data-action="modal" data-id-transaction="{{ $transaction->id }}" data-modal-id="#modal-update-transaction">Editar</a></li>

                                            <li><hr class="border-[#282541] border"></li>

                                            <li  class="text-sm text-[#E5363D] hover:bg-[#78778B]/20  transition pl-2 py-1 cursor-pointer">
                                                <a class="block w-full h-full" data-action="modal" data-id-transaction="{{ $transaction->id }}" data-name-transaction="{{ $transaction->category->name }}"
                                                   data-amount-transaction="{{ number_format($transaction->amount, 2, ',', '.') }}" data-modal-id="#modal-delete-transaction">Apagar</a></li>
                                        </ul>

                                        <hr class="border-[#282541] border-dashed">


                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td><span class="text-white text-lg">Nenhuma transação cadastrada!</span></td>
                    </tr>
                @endif



                </tbody>
            </table>
        </section>

    </main>

    @include('transactions.modals.new-transaction', ['categories' => $categories, 'wallets' => $wallets])
    @include('transactions.modals.delete-transaction')
    @include('transactions.modals.update-transaction')
    @include('transactions.modals.update-payment-transaction')

    @push('scripts')
        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const modal = document.getElementById('modal-new-transaction');
                    const content = modal.querySelector('.modal-content');

                    modal.classList.remove('opacity-0', 'pointer-events-none');
                    content.classList.remove('scale-95');
                });

            </script>
        @endif
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                new TomSelect("#select-category",{
                    create: true,
                    sortField: {
                        field: "text"
                    }
                });

                new TomSelect("#select-wallet",{
                    create: true,
                    sortField: {
                        field: "text"
                    }
                });

                let selectUpdateTransaction = new TomSelect("#update-category",{
                    create: true,
                    sortField: {
                        field: "text"
                    }
                });

                //FUNÇÂO MODAL DELETE
                const modalDeleteTransaction = document.getElementById('modal-delete-transaction');
                modalDeleteTransaction.addEventListener('openModal', (e) => {
                    const btn = e.detail.btn;

                    const name =  btn.dataset.nameTransaction;
                    const amount =  btn.dataset.amountTransaction;
                    const id =  btn.dataset.idTransaction;

                    document.querySelector('.name-transaction-modal-delete-transaction').textContent = name;
                    document.querySelector('.amount-transaction-modal-delete-transaction').textContent = amount;
                    document.querySelector('#id-transaction-modal-delete-transaction').value = id;


                });

                //FUNÇÂO MODAL UPDATE
                const modalUpdateTransaction = document.getElementById('modal-update-transaction');
                modalUpdateTransaction.addEventListener('openModal', (e) => {
                    const btn = e.detail.btn;
                    const id =  btn.dataset.idTransaction;

                    axios.get(`/transacoes/editar/${id}`)
                        .then(response => {
                            const transaction = response.data.transaction;

                            selectUpdateTransaction.setValue(transaction.category.id)
                            document.querySelector('input[name=amount_update]').value = transaction.amount;
                            document.querySelectorAll('input[name="type_update"]').forEach(radio => {
                                radio.checked = radio.value === transaction.type;
                            });

                            document.querySelector('#id-transaction-modal-update-transaction').value = transaction.id;

                        })
                        .catch(error => {
                            console.error('Erro ao obter os dados da transação:', error);
                        });

                });

                modalUpdateTransaction.addEventListener('closeModal', () => {
                    setTimeout(() => {
                        selectUpdateTransaction.setValue('');
                        document.querySelector('input[name=amount_update]').value = '';
                        document.querySelectorAll('input[name="type_update"]').forEach(radio => {
                            radio.checked = false;
                        });
                        document.querySelector('#id-transaction-modal-update-transaction').value = '';
                    }, 500);

                });

                //FUNÇÂO MODAL UPDATE PAYMENT
                const modalUpdatePaymentTransaction = document.getElementById('modal-update-payment-transaction');
                modalUpdatePaymentTransaction.addEventListener('openModal', (e) => {
                    const btn = e.detail.btn;
                    document.querySelector('#id-transaction-modal-update-payment-transaction').value = btn.dataset.idTransaction;

                });

            });


        </script>
    @endpush

</x-base-layout>




