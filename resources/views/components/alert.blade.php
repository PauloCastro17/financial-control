<div class="px-7 flex justify-center items-center alert">
    <div class="{{ $ColorClasses() }} w-full rounded-lg flex justify-between p-5">
        <div class="flex items-center gap-2">
            <i class="{{ $IconClasses() }} text-lg"></i>
            <p class="text-lg leading-tight">{{ $message }}</p>
        </div>

        <button data-action="closeAlert" class=" hover:text-white/60 transition cursor-pointer mr-3"><i class="fa-solid fa-x "></i></button>
    </div>

</div>
