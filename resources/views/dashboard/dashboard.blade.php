<x-base-layout :sub-pag-menu="$subPagMenu">

    <main class="w-full">
        @session('success')
        <p>{{ session('success') }}</p>
        @endsession

        <x-header pag-menu="Dashboard"/>

        <!--CARDS INICIAIS-->
        <section class="p-4 flex gap-8">
            <!--Saldo Total-->
            <div class="bg-[#201E34] w-100 h-32 rounded-xl flex justify-center items-center gap-3 card-dashboard cursor-pointer transition">
                <span class="w-12 h-12 rounded-full bg-[#292642] flex items-center justify-center"><i class="fa-solid fa-wallet "></i></span>

                <div class="flex flex-col items-center">
                    <p class="text-[#929EAE] font-semibold ">Saldo Total</p>
                    <p class=" font-semibold">$2500</p>
                </div>
            </div>
            <!--Gastos totais-->
            <div class="bg-[#201E34] w-100 h-32 rounded-xl flex justify-center items-center gap-3 card-dashboard cursor-pointer transition">
                <span class="w-12 h-12 rounded-full bg-[#292642] flex items-center justify-center"><i class="fa-solid fa-receipt "></i></span>

                <div class="flex flex-col items-center">
                    <p class="text-[#929EAE] font-semibold ">Gastos totais</p>
                    <p class=" font-semibold">$2500</p>
                </div>
            </div>
            <!--Total economizado-->
            <div class="bg-[#201E34] w-100 h-32 rounded-xl flex justify-center items-center gap-3 card-dashboard cursor-pointer transition">
                <span class="w-12 h-12 rounded-full bg-[#292642] flex items-center justify-center"><i class="fa-solid fa-money-check-dollar "></i></span>

                <div class="flex flex-col items-center">
                    <p class="text-[#929EAE] font-semibold ">Total economizado</p>
                    <p class=" font-semibold">$2500</p>
                </div>
            </div>

        </section>

        <x-dashboard-chart :payments="$payments ?? null" :transactions="$transactions ?? null"/>

        {{--TRANSAÇÕES RECENTES--}}
        <section class="p-4 ml-4 my-5 flex flex-col border rounded-lg w-315 border-[#282541]">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold">Transações Recentes</h1>

                <a class=" font-semibold text-[#29A073] flex items-center">Ver mais <i class=" fa-solid fa-chevron-right text-sm"></i></a>
            </div>


            <div>
                teste
            </div>
        </section>

        {{--TRANSAÇÕES RECENTES--}}
        <section class="p-4 ml-4 my-5 flex flex-col border rounded-lg w-315 border-[#282541]">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold">Transferências Recentes</h1>

                <a class=" font-semibold text-[#29A073] flex items-center">Ver mais <i class=" fa-solid fa-chevron-right text-sm"></i></a>
            </div>


            <div>
                teste
            </div>
        </section>
    </main>

</x-base-layout>
