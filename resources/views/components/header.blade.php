<header class="flex justify-between p-6">
    <h1 class="text-3xl font-bold">{{ $pagMenu }}</h1>

    <div class="flex items-center gap-12">
        <!--PESQUISA-->
        <a class="text-[#929EAE] text-2xl cursor-pointer hover:opacity-50"><i class="fa-solid fa-filter"></i></a>


        <!--PERFIL-->
        <div class="flex items-center gap-2">
            <img class="w-10" src="{{ asset("/images/user_photo.png") }}" alt="user_photo">

            <span class="max-w-24 overflow-hidden truncate text-ellipsis" title="{{ auth()->user()->name }}">{{ auth()->user()->name }}</span>


            <button class="cursor-pointer text-2xl hover:opacity-50"><i class="fa-solid fa-caret-down"></i></button>
        </div>
    </div>
</header>
