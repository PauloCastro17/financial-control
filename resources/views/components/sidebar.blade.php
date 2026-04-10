<section class="lg:basis-3xs flex flex-col bg-[#1E1C30] justify-between p-6">
    <div class="flex flex-col gap-8">
        <img src="{{ asset('/images/logo.svg') }}" class="w-32" alt="logo_sidebar"/>

        <nav class="flex flex-col gap-2">
            <a href="{{ route('site.dashboard') }}">
                <div class="text-[#929EAE] w-44 p-3 rounded-md hover:bg-[#C8EE44] hover:text-[#1B212D] cursor-pointer transition {{ !empty($subPagMenu) && $subPagMenu === "dashboard" ? "active-btn-sidebar" : ""  }}">
                    <i class="fa-solid fa-house "></i>
                    <span  class=" font-bold">Dashboard</span>
                </div>
            </a>

            <a href="{{ route('site.payments') }}">
                <div class="text-[#929EAE] w-44 p-3 rounded-md hover:bg-[#C8EE44] hover:text-[#1B212D] cursor-pointer transition {{ !empty($subPagMenu) && $subPagMenu === "payments" ? "active-btn-sidebar" : ""  }}">
                    <i class="fa-solid fa-money-bill"></i>
                    <span  class=" font-bold">Pagamentos</span>
                </div>
            </a>
            <a >
                <div class="text-[#929EAE] w-44 p-3 rounded-md hover:bg-[#C8EE44] hover:text-[#1B212D] cursor-pointer transition {{ !empty($subPagMenu) && $subPagMenu === "pending-issues" ? "active-btn-sidebar" : ""  }}">
                    <i class="fa-solid fa-receipt"></i>
                    <span class=" font-bold">Pendências</span>
                </div>
            </a>
            <a>
                <div class="text-[#929EAE] w-44 p-3 rounded-md hover:bg-[#C8EE44] hover:text-[#1B212D] cursor-pointer transition {{ !empty($subPagMenu) && $subPagMenu === "configs" ? "active-btn-sidebar" : ""  }}">
                    <i class="fa-solid fa-gear "></i>
                    <span class=" font-bold">Configurações</span>
                </div>
            </a>

        </nav>
    </div>

</section>
