<x-base-layout :sub-pag-menu="$subPagMenu">

    <main class="w-full ">
        @session('success')
        <p>{{ session('success') }}</p>
        @endsession

        <x-header pag-menu="Transações"/>

        <!--SEARCH NAME-->
        <article class="w-full pl-7 mb-5 justify-between flex items-center">
            <div class="flex items-center relative   ">
                <i class="fa-brands fa-sistrix text-[#78778B] absolute left-2 text-2xl"></i>
                <input type="text" placeholder="Procurar por nome"
                       class="text-xl w-96 p-3  rounded-xl bg-[#282541] border border-[#201E34] text-[#78778B] pl-12 "/>
            </div>

            <button class="bg-[#C8EE44] text-[#1B212D] mr-10 flex items-center p-4 rounded-lg gap-2 w-54" >
                <i class="fa-solid fa-money-check-dollar text-xl "></i>
                <p class="text-xl font-semibold">Criar transação</p>
            </button>
        </article>


        <section class=" max-w-[95%] ml-7 mb-5 flex justify-center items-center">
            <table class="table-fixed w-full mt-3 border-[#201E34] justify-center">
                <thead class="text-[#78778B] uppercase">
                    <tr>
                        <th class="py-3 w-[30%] text-start">Nome da transação</th>
                        <th class="py-3 w-[20%] text-start">Tipo</th>
                        <th class="py-3 w-[20%] text-start">Valor</th>
                        <th class="py-3 w-[30%] text-start">Data da transação</th>
                        <th class="py-3 w-[15%] text-start">Status</th>
                        <th class="py-3 w-[10%] text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($transactions as $transaction)
                    <tr>
                        <td class="text-start border-b-1 border-[#201E34] py-4 text-white">
                            <div class="flex justify-start">
                                <div class="flex items-center gap-2 justify-center">
                                <span class="w-10 h-10 rounded-lg bg-[#292642] flex items-center justify-center">
                                    <i class="fa-solid text-xl text-[#29A073] fa-money-bill-transfer"></i>
                                </span>
                                    {{ $transaction->category->name }}
                                </div>
                            </div>
                        </td>
                        <td class="text-start border-b-1 border-[#201E34] py-4 text-[#78778B]">{{ $transaction->type_transaction }}</td>
                        <td class="text-start border-b-1 border-[#201E34] py-4 text-white">${{ $transaction->amount }}</td>
                        <td class="text-start border-b-1 border-[#201E34] py-4 ">
                            <p class="text-white">{{ $transaction->initial_date }}</p>
                            <p class="text-[#78778B]">às {{ $transaction->final_date }}</p>
                        </td>
                        <td class="text-start border-b-1 border-[#201E34] py-4 ">
                            <div class="w-[60%] p-2 rounded-lg text-center font-semibold {{ $transaction->status_color_transaction }}">{{ $transaction->status_transaction }}</div>
                        </td>
                        <td class=" border-b-1 border-[#201E34] py-4 text-center text-3xl">...</td>
                    </tr>
                @endforeach




                </tbody>
            </table>
        </section>
    </main>

</x-base-layout>
