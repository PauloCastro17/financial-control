<x-base-layout sub-pag-menu="">
    <main class="w-full ">

        <x-header pag-menu="Meu Perfil"/>
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ auth()->user()->id }}" />

            @session('alert')
            <x-alert :message="session('alert.message')" :type="session('alert.type')"/>
            @endsession

            <section class="p-7 m-5 flex flex-col border rounded-lg border-[#282541] bg-[#201E34]">
                <div class="flex items-center justify-between">
                    <h1 class="text-white text-xl">Informações Pessoais</h1>
                    <button type="button" class="text-[#29A073]  cursor-pointer hover:text-[#29A073]/80" id="btn-edit-profile">
                        <i class="fa-regular fa-pen-to-square "></i>
                        <span>Editar</span>
                    </button>
                </div>

                <div class="flex flex-col text-white gap-2 pt-8">
                    <label class="font-bold" for="name">Nome</label>
                    <input name="name"  type="text" placeholder="Insira seu nome"  class="w-full border p-3 border-gray-600 rounded-xl" value="{{ auth()->user()->name }}" required/>

                    @error('name')
                    <span class="text-md text-red-400">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col text-white gap-2 pt-6">
                    <label class="font-bold" for="email">Email</label>
                    <input disabled type="email" placeholder="Insira seu email"  class="w-full  p-3 bg-gray-500/20 rounded-xl" value="{{ auth()->user()->email }}"  required/>

                </div>

                <div class="flex justify-between">
                    <div class="flex flex-col text-white gap-2 pt-6">
                        <label class="font-bold" for="email">Data de nascimento</label>
                        <input name="date" type="date" placeholder="Insira sua data de nascimento"  class="w-2xl border p-3 border-gray-600 rounded-xl" value="{{ auth()->user()->dateofbirth }}"  />

                        @error('date')
                        <span class="text-md text-red-400">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-col text-white gap-2 pt-6">
                        <label class="font-bold" for="phone">Telefone</label>
                        <input name="phone" type="tel" placeholder="Insira seu telefone"  class="w-2xl border p-3 border-gray-600 rounded-xl" value="{{ auth()->user()->phone }}"  />

                        @error('phone')
                        <span class="text-md text-red-400">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="pt-5 flex justify-end">

                    <button type="submit" class="bg-[#29A073] p-2 w-50 rounded-lg hover:bg-[#29A073]/60 cursor-pointer text-white hidden" id="btn-update-profile">Atualizar</button>
                </div>

            </section>
        </form>
    </main>

    @push('scripts')
        <script>
            document.getElementById('btn-edit-profile').addEventListener('click', (e) => {

                const icon = e.currentTarget.querySelector('i');
                const span = e.currentTarget.querySelector('span');

                if (icon.classList.contains('fa-pen-to-square')) {
                    icon.classList.remove('fa-regular', 'fa-pen-to-square');
                    icon.classList.add('fa-solid', 'fa-xmark');
                    span.textContent = "";
                } else {
                    icon.classList.remove('fa-solid', 'fa-xmark');
                    icon.classList.add('fa-regular', 'fa-pen-to-square');
                    span.textContent = "Editar";
                }

                document.getElementById('btn-update-profile').classList.toggle('hidden');

            });


        </script>
    @endpush

</x-base-layout>


