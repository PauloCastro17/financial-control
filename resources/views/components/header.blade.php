<header class="flex justify-between items-center px-7 py-4">
    <h1 class="text-3xl font-bold text-white">{{ $pagMenu }}</h1>

    <div class="flex items-center gap-6">


        <div class="relative">
            <!--PERFIL-->
            <button class="flex items-center gap-2 bg-[#201E34] rounded-full p-2 cursor-pointer transition" id="btn-user-info" onclick="openUserInfoHeader()">
                <img class="w-12" src="{{ asset("/images/user_photo.png") }}" alt="user_photo">
            </button>

            <!--BARRA PERFIL-->
            <div class="absolute right-3 z-20 top-18 bg-[#201E34] w-72  rounded-lg border border-[#282541] div-user-infos-header hidden ">
                <!-- Ícone -->
                <i class="fa-solid fa-caret-up text-4xl absolute -top-5 right-0 text-[#201E34]"></i>
                <div class="flex flex-col items-center py-4 gap-2">
                    <img class="w-15" src="{{ asset("/images/user_photo.png") }}" alt="user_photo">
                    <span class="wrap-anywhere text-center w-52 text-white" title="{{ auth()->user()->name }}">{{ auth()->user()->name }}</span>
                </div>

                <hr class="border-[#282541] border-dashed">

                    <a class="flex px-3 py-2 my-3 items-center gap-2 hover:bg-sky-200/20 cursor-pointer text-sm transition text-white ">
                        <i class="fa-solid fa-user"></i>
                        <span>Meu perfil</span>
                    </a>

                    <a class="flex px-3 py-2 my-3 items-center gap-2 hover:bg-sky-200/20 cursor-pointer text-sm transition text-white">
                        <i class="fa-solid fa-gear"></i>
                        <span>Configurações</span>
                    </a>

                <hr class="border-[#282541]">

                <div class="px-3 py-1 my-3 flex justify-center text-center ">
                    <a href="{{ route("auth.logout") }}" class="w-[80%] bg-[#1C1A2E] border-2 border-[#282541] p-2 rounded-sm shadow-xl/20 cursor-pointer hover:bg-[#1C1A2E]/40 transition text-white">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span class=" font-bold">Sair</span>
                    </a>
                </div>
                <hr class="border-[#282541]">
            </div>
        </div>
    </div>
</header>
