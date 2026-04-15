<x-base-layout :sub-pag-menu="$subPagMenu">

    <main class="w-full ">
        @session('success')
        <p>{{ session('success') }}</p>
        @endsession

        <x-header pag-menu="Transações"/>

        <!--SEARCH NAME-->
        <article class="w-full ml-5 mb-5">
            <div class="flex items-center relative   ">
                <i class="fa-brands fa-sistrix text-[#78778B] absolute left-2 text-2xl"></i>
                <input type="text" placeholder="Procurar por nome" class="text-xl w-96 p-3  rounded-xl bg-[#282541] border border-[#201E34] text-[#78778B] pl-12 " />
            </div>
        </article>

        <section class="w-[100rem]  ml-5 flex justify-center items-center">
            <table class="table-fixed w-full mt-3 border-t-2 border-[#201E34]">
                <thead class="text-[#78778B] uppercase">
                <tr>
                    <th class="py-3 w-1/5">Nome transação</th>
                    <th class="py-3 w-1/5">Tipo</th>
                    <th class="py-3 w-1/5">Valor</th>
                    <th class="py-3 w-1/5">Situação</th>
                    <th class="py-3 w-1/5">Data</th>
                    <th class="py-3 w-1/5">Data</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center border-b-2 border-[#201E34] py-3 flex items-center gap-2 justify-center text-white">
                        <span class="w-10 h-10 rounded-lg bg-[#292642] flex items-center justify-center"><i class="fa-solid text-xl text-[#29A073] fa-money-bill-transfer"></i></span>
                        ENERGIAssss
                    </td>
                    <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">Malcolm Lockyer</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3 text-white">1961</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3 text-white">1961</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">1961</td>
                    <td class="text-center border-b-2 border-[#201E34] py-3 text-[#78778B]">1961</td>
                </tr>




                </tbody>
            </table>
        </section>
    </main>

</x-base-layout>
