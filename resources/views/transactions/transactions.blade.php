<x-base-layout sub-pag-menu="transactions">

    <main class="w-full ">


        <x-header pag-menu="Transações"/>

        <!--SEARCH NAME-->
        <article class="w-full pl-7 mb-5 justify-between flex items-center">
            <div class="flex items-center relative   ">
                <i class="fa-brands fa-sistrix text-[#78778B] absolute left-2 text-2xl"></i>
                <form action="{{ route('site.transactions') }}" method="GET">
                    <input type="text" name="search" value="{{ old('search', request('search')) }}"  placeholder="Procurar por nome"
                           class="text-xl w-96 p-3  rounded-xl bg-[#282541] border border-[#201E34] text-[#78778B] pl-12 "/>
                </form>
            </div>

            <button data-action="modal" data-modal-id="#modal-new-transaction" class="bg-[#C8EE44] text-[#1B212D] mr-10 flex items-center p-4 rounded-lg gap-2 w-54 hover:bg-[#A0B84B] hover:text-[#1B212D] cursor-pointer transition" >
                <i class="fa-solid fa-money-check-dollar text-xl "></i>
                <p class="text-xl font-semibold">Criar transação</p>
            </button>
        </article>


        @session('alert')
            <x-alert :message="session('alert.message')" :type="session('alert.type')"/>
        @endsession
        <section class=" max-w-[95%] ml-7 mb-5 flex justify-center items-center">


            <table class="table-fixed w-full mt-3 border-[#201E34] justify-center">
                <thead class="text-[#78778B] uppercase">
                    <tr>
                        <th class="py-3 w-[30%] text-start">Nome da transação</th>
                        <th class="py-3 w-[20%] text-start">Tipo</th>
                        <th class="py-3 w-[20%] text-start">Valor</th>
                        <th class="py-3 w-[15%] text-start">Status</th>
                        <th class="py-3 w-[25%] text-start">Data da transação</th>
                        <th class="py-3 w-[13%] text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>

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
                        <td class="text-start border-b border-[#201E34] py-4 text-[#78778B]">{{ $transaction->type_transaction }}</td>
                        <td class="text-start border-b border-[#201E34] py-4 text-white">${{ $transaction->amount }}</td>
                        <td class="text-start border-b border-[#201E34] py-4 ">
                            <div class="w-[60%] p-3 rounded-lg text-center font-medium {{ $transaction->status_color_transaction }}">{{ $transaction->status_transaction }}</div>
                        </td>
                        <td class="text-start border-b border-[#201E34] py-4 ">
                            @if(!is_null($transaction->transaction_date ))
                                <p class="text-white">{{ $transaction->initial_date }}</p>
                                <p class="text-[#78778B]">às {{ $transaction->final_date }}</p>
                            @else
                                <p class="text-[#78778B]">Pagamento pendente!</p>
                            @endif
                        </td>
                        <td class=" border-b border-[#201E34] py-4 text-center text-3xl">
                            <div class="flex justify-center items-center dropdown relative">
                                <button data-action="dropdown" class="w-15  text-white text-center cursor-pointer p-1 rounded-lg hover:bg-[#1E1C30] hover:text-[#78778B] transition">
                                    <i class="fa-solid fa-ellipsis text-xl text-center"></i>
                                </button>

                                <div class="absolute left-15 z-30 top-9 bg-[#201E34] w-30  rounded-lg border border-[#282541] dropdown-menu hidden">
                                    <!-- Ícone -->
                                    <div class="flex flex-col items-center py-4 gap-2">
                                        <button>Editar</button>

                                        <hr class="border-[#282541] border-dashed">
                                        <button>Editar</button>
                                    </div>

                                    <hr class="border-[#282541] border-dashed">


                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach




                </tbody>
            </table>
        </section>

    </main>

    @include('transactions.new-transaction', ['categories' => $categories])

</x-base-layout>


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
