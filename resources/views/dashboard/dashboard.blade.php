<x-base-layout :sub-pag-menu="$subPagMenu">

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
                <span class="w-12 h-12 rounded-full bg-[#292642] flex items-center justify-center"><i
                        class="fa-solid fa-wallet "></i></span>

                <div class="flex flex-col items-center">
                    <p class="text-[#929EAE] font-semibold ">Saldo Total</p>
                    <p class=" font-semibold">$0</p>
                </div>
            </div>
            <!--Gastos totais-->
            <div
                class="bg-[#201E34] w-1/3 h-32 rounded-xl flex justify-center items-center gap-3 card-dashboard cursor-pointer transition">
                <span class="w-12 h-12 rounded-full bg-[#292642] flex items-center justify-center"><i
                        class="fa-solid fa-receipt "></i></span>

                <div class="flex flex-col items-center">
                    <p class="text-[#929EAE] font-semibold ">Gastos totais</p>
                    <p class=" font-semibold">$0</p>
                </div>
            </div>
            <!--Total economizado-->
            <div
                class="bg-[#201E34] w-1/3 h-32 rounded-xl flex justify-center items-center gap-3 card-dashboard cursor-pointer transition mr-5">
                <span class="w-12 h-12 rounded-full bg-[#292642] flex items-center justify-center"><i
                        class="fa-solid fa-money-check-dollar "></i></span>

                <div class="flex flex-col items-center">
                    <p class="text-[#929EAE] font-semibold ">Total economizado</p>
                    <p class=" font-semibold">$0</p>
                </div>
            </div>

        </section>

        <x-dashboard-chart :payments="$payments ?? null" :transactions="$transactions ?? null"/>

        {{--TRANSAÇÕES RECENTES--}}
        <section class="p-7 m-5 flex flex-col border rounded-lg border-[#282541]">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold">Transações Recentes</h1>

                <a class=" font-semibold text-[#29A073] flex items-center">Ver mais <i
                        class=" fa-solid fa-chevron-right text-sm"></i></a>
            </div>
            <table class="table-fixed w-full mt-3">
                <thead class="text-[#78778B] uppercase">
                    <tr>
                        <th class="py-3 w-1/5">Nome transação</th>
                        <th class="py-3 w-1/5">Tipo</th>
                        <th class="py-3 w-1/5">Valor</th>
                        <th class="py-3 w-1/5">Situação</th>
                        <th class="py-3 w-1/5">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center border-b-2 border-[#201E34] py-3 flex items-center gap-2 justify-center">
                            <span class="w-10 h-10 rounded-lg bg-[#292642] flex items-center justify-center"><i class="fa-solid text-xl text-[#29A073] fa-money-bill-transfer"></i></span>
                            ENERGIAssss
                        </td>
                        <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">Malcolm Lockyer</td>
                        <td class="text-center border-b-2 border-[#201E34] py-3">1961</td>
                        <td class="text-center border-b-2 border-[#201E34] py-3">1961</td>
                        <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">1961</td>
                    </tr>

                    <tr>
                        <td class="text-center border-b-2 border-[#201E34] py-3 flex items-center gap-2 justify-center">
                            <span class="w-10 h-10 rounded-lg bg-[#292642] flex items-center justify-center"><i class="fa-solid text-xl text-[#29A073] fa-money-bill-transfer"></i></span>
                            ENERGIAssss
                        </td>
                        <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">Malcolm Lockyer</td>
                        <td class="text-center border-b-2 border-[#201E34] py-3">1961</td>
                        <td class="text-center border-b-2 border-[#201E34] py-3">1961</td>
                        <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">1961</td>
                    </tr>

                    <tr>
                        <td class="text-center border-b-2 border-[#201E34] py-3 flex items-center gap-2 justify-center">
                            <span class="w-10 h-10 rounded-lg bg-[#292642] flex items-center justify-center"><i class="fa-solid text-xl text-[#29A073] fa-money-bill-transfer"></i></span>
                            ENERGIAssss
                        </td>
                        <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">Malcolm Lockyer</td>
                        <td class="text-center border-b-2 border-[#201E34] py-3">1961</td>
                        <td class="text-center border-b-2 border-[#201E34] py-3">1961</td>
                        <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">1961</td>
                    </tr>


                </tbody>
            </table>

        </section>

        {{--TRANSFERÊNCIAS RECENTES--}}
        <section class="p-7 m-5 flex flex-col border rounded-lg border-[#282541]">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold">Tranferências Recentes</h1>

                <a class=" font-semibold text-[#29A073] flex items-center">Ver mais <i
                        class=" fa-solid fa-chevron-right text-sm"></i></a>
            </div>
            <table class="table-fixed w-full mt-3">
                <thead class="text-[#78778B] uppercase">
                <tr>
                    <th class="py-3 w-1/5">Nome transação</th>
                    <th class="py-3 w-1/5">Tipo</th>
                    <th class="py-3 w-1/5">Valor</th>
                    <th class="py-3 w-1/5">Situação</th>
                    <th class="py-3 w-1/5">Data</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center border-b-2 border-[#201E34] py-3 flex items-center gap-2 justify-center">
                        <span class="w-10 h-10 rounded-lg bg-[#292642] flex items-center justify-center"><i class="fa-solid text-xl text-[#E5363D] fa-money-bill-transfer"></i></span>
                        ENERGIAssss
                    </td>
                    <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">Malcolm Lockyer</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3">1961</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3">1961</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">1961</td>
                </tr>

                <tr>
                    <td class="text-center border-b-2 border-[#201E34] py-3 flex items-center gap-2 justify-center">
                        <span class="w-10 h-10 rounded-lg bg-[#292642] flex items-center justify-center"><i class="fa-solid text-xl text-[#E5363D] fa-money-bill-transfer"></i></span>
                        ENERGIAssss
                    </td>
                    <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">Malcolm Lockyer</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3">1961</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3">1961</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">1961</td>
                </tr>

                <tr>
                    <td class="text-center border-b-2 border-[#201E34] py-3 flex items-center gap-2 justify-center">
                        <span class="w-10 h-10 rounded-lg bg-[#292642] flex items-center justify-center"><i class="fa-solid text-xl text-[#E5363D] fa-money-bill-transfer"></i></span>
                        ENERGIAssss
                    </td>
                    <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">Malcolm Lockyer</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3">1961</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3">1961</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">1961</td>
                </tr>


                </tbody>
            </table>

        </section>

    </main>

</x-base-layout>
