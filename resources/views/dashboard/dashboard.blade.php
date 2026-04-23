<x-base-layout sub-pag-menu="dashboard">

    <main class="w-full ">
        @session('success')
        <p>{{ session('success') }}</p>
        @endsession

        <x-header pag-menu="Dashboard"/>

        <!--CARDS INICIAIS-->
        <section class=" flex w-full gap-8">
            <!--Saldo Total-->
            <div
                class="ml-5 bg-[#201E34] w-1/3 h-32 rounded-xl flex justify-center items-center gap-3 card-dashboard cursor-pointer transition">
                <span class="w-12 h-12 rounded-full bg-[#292642] flex items-center justify-center text-[#C8EE44]"><i
                        class="fa-solid fa-wallet "></i></span>

                <div class="flex flex-col items-center">
                    <p class="text-[#929EAE] font-semibold ">Saldo Total</p>
                    <p class=" font-semibold text-white">$0</p>
                </div>
            </div>
            <!--Gastos totais-->
            <div
                class="bg-[#201E34] w-1/3 h-32 rounded-xl flex justify-center items-center gap-3 card-dashboard cursor-pointer transition">
                <span class="w-12 h-12 rounded-full bg-[#292642] flex items-center justify-center text-[#C8EE44]"><i
                        class="fa-solid fa-receipt "></i></span>

                <div class="flex flex-col items-center">
                    <p class="text-[#929EAE] font-semibold ">Gastos totais</p>
                    <p class=" font-semibold text-white">$0</p>
                </div>
            </div>
            <!--Total economizado-->
            <div
                class="bg-[#201E34] w-1/3 h-32 rounded-xl flex justify-center items-center gap-3 card-dashboard cursor-pointer transition mr-5">
                <span class="w-12 h-12 rounded-full bg-[#292642] flex items-center justify-center text-[#C8EE44]"><i
                        class="fa-solid fa-money-check-dollar "></i></span>

                <div class="flex flex-col items-center">
                    <p class="text-[#929EAE] font-semibold ">Total economizado</p>
                    <p class=" font-semibold text-white">$0</p>
                </div>
            </div>

        </section>

        <x-dashboard-chart :months=" $months ?? null" :income=" $income ?? null" :expense=" $expense ?? null"/>

        {{--TRANSAÇÕES RECENTES--}}
        <section class="p-7 m-5 flex flex-col border rounded-lg border-[#282541]">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold text-white">Transações Recentes</h1>

                <a href="{{ route('site.transactions') }}" class=" font-semibold text-[#29A073] flex items-center hover:text-[#29A073]/70 transition">Ver mais
                    <i class=" fa-solid fa-chevron-right text-sm"></i></a>
            </div>
            <table class="table-fixed w-full mt-3">
                <thead class="text-[#78778B] uppercase">
                    <tr>
                        <th class="py-3 w-1/4 text-start">Nome transação</th>
                        <th class="py-3 w-1/4 text-start">Tipo</th>
                        <th class="py-3 w-1/4 text-start">Valor</th>
                        <th class="py-3 w-1/4 text-start">Data</th>
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
                            <p class="text-white">{{ $transaction->initial_date }}</p>
                            <p class="text-[#78778B]">às {{ $transaction->final_date }}</p>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>

        </section>

    </main>

</x-base-layout>
