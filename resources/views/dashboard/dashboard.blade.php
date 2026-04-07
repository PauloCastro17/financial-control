<x-base-layout>

    <main class="w-full">
        @session('success')
        <p>{{ session('success') }}</p>
        @endsession

        <x-header pag-menu="Dashboard"/>

        <!--CARDS INICIAIS-->
        <section class="p-6 flex gap-8">
            <!--Saldo Total-->
            <div class="bg-[#201E34] w-58 h-32 rounded-xl flex justify-center items-center gap-3 card-dashboard cursor-pointer transition">
                <span class="w-12 h-12 rounded-full bg-[#292642] flex items-center justify-center"><i class="fa-solid fa-wallet "></i></span>

                <div class="flex flex-col items-center">
                    <p class="text-[#929EAE] font-semibold ">Saldo Total</p>
                    <p class=" font-semibold">$2500</p>
                </div>
            </div>
            <!--Gastos totais-->
            <div class="bg-[#201E34] w-58 h-32 rounded-xl flex justify-center items-center gap-3 card-dashboard cursor-pointer transition">
                <span class="w-12 h-12 rounded-full bg-[#292642] flex items-center justify-center"><i class="fa-solid fa-receipt "></i></span>

                <div class="flex flex-col items-center">
                    <p class="text-[#929EAE] font-semibold ">Gastos totais</p>
                    <p class=" font-semibold">$2500</p>
                </div>
            </div>
            <!--Total economizado-->
            <div class="bg-[#201E34] w-58 h-32 rounded-xl flex justify-center items-center gap-3 card-dashboard cursor-pointer transition">
                <span class="w-12 h-12 rounded-full bg-[#292642] flex items-center justify-center"><i class="fa-solid fa-money-check-dollar "></i></span>

                <div class="flex flex-col items-center">
                    <p class="text-[#929EAE] font-semibold ">Total economizado</p>
                    <p class=" font-semibold">$2500</p>
                </div>
            </div>

        </section>


        {{--<h1>DASHBOARD</h1>--}}
    </main>

</x-base-layout>
