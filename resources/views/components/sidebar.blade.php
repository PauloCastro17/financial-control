<section class="lg:basis-3xs flex flex-col bg-[#1E1C30] justify-between p-6">
    <div class="flex flex-col gap-8">
        <img src="{{ asset('/images/logo.svg') }}" class="w-32" alt="logo_sidebar"/>

        <nav class="flex flex-col gap-2">
            <div class="text-[#929EAE] w-44 p-3 rounded-md hover:bg-[#C8EE44] hover:text-[#1B212D] cursor-pointer transition {{ !empty($subPagMenu) && $subPagMenu === "dashboard" ? "active-btn-sidebar" : ""  }}">
                <i class="fa-solid fa-house "></i>
                <a class=" font-bold">Dashboard</a>
            </div>

            <div class="text-[#929EAE] w-44 p-3 rounded-md hover:bg-[#C8EE44] hover:text-[#1B212D] cursor-pointer transition {{ !empty($subPagMenu) && $subPagMenu === "payments" ? "active-btn-sidebar" : ""  }}">
                <i class="fa-solid fa-money-bill"></i>
                <a class=" font-bold">Pagamentos</a>
            </div>

            <div class="text-[#929EAE] w-44 p-3 rounded-md hover:bg-[#C8EE44] hover:text-[#1B212D] cursor-pointer transition {{ !empty($subPagMenu) && $subPagMenu === "pending-issues" ? "active-btn-sidebar" : ""  }}">
                <i class="fa-solid fa-receipt"></i>
                <a class=" font-bold">Pendências</a>
            </div>

            <div class="text-[#929EAE] w-44 p-3 rounded-md hover:bg-[#C8EE44] hover:text-[#1B212D] cursor-pointer transition {{ !empty($subPagMenu) && $subPagMenu === "configs" ? "active-btn-sidebar" : ""  }}">
                <i class="fa-solid fa-gear "></i>
                <a class=" font-bold">Configurações</a>
            </div>


        </nav>
    </div>

    <div class="flex flex-col gap-5 justify-end">
        <div class="text-[#929EAE] w-44 p-3 rounded-md hover:bg-[#C8EE44] hover:text-[#1B212D] cursor-pointer transition">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <a href="{{ route('auth.logout') }}" class=" font-bold">Sair</a>
        </div>
    </div>
</section>
