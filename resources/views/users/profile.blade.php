<x-base-layout sub-pag-menu="">
    <main class="w-full ">

        <x-header pag-menu="Meu Perfil"/>
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
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
                    <input id="old-photo" name="old_photo" type="hidden" value="{{ auth()->user()->photo }}" required/>
                    <div class="relative w-fit">
                        <img src="" alt=""  hidden id="preview-image-profile" class="w-40 h-40 rounded-full object-cover mb-5" />

                        <button hidden id="drop-preview-image" type="button" class="text-white hover:text-white/60 transition cursor-pointer absolute top-0 right-0">
                            <i classw="fa-solid fa-x "></i>
                        </button>
                    </div>


                    <div>
                        <label for="input-file" class="text-4xl flex flex-col items-center border p-5 rounded-lg border-dashed cursor-pointer">
                            <i class="fa-regular fa-image "></i>
                            <span id="span-image">Selecionar arquivo</span>
                        </label>
                        <input hidden name="photo" id="input-file" type="file" value="{{ auth()->user()->photo }}" />
                    </div>



                    @error('photo')
                        <span class="text-md text-red-400">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col text-white gap-2 pt-8">
                    <label class="font-bold" for="name">Nome</label>
                    <input name="name" readonly type="text" placeholder="Insira seu nome"  class="w-full border p-3 border-gray-600 rounded-xl" value="{{ auth()->user()->name }}" required/>
                    <input id="old_name" type="hidden" value="{{ auth()->user()->name }}" />
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
                        <input name="date" type="date" readonly placeholder="Insira sua data de nascimento"  class="w-2xl border p-3 border-gray-600 rounded-xl" value="{{ auth()->user()->dateofbirth }}"  />
                        <input id="old_datebirth" type="hidden" value="{{ auth()->user()->dateofbirth }}" />

                        @error('date')
                        <span class="text-md text-red-400">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-col text-white gap-2 pt-6">
                        <label class="font-bold" for="phone">Telefone</label>
                        <input name="phone" type="tel" readonly placeholder="Insira seu telefone"  class="w-2xl border p-3 border-gray-600 rounded-xl" value="{{ auth()->user()->phone }}"  />
                        <input id="old_phone" type="hidden" value="{{ auth()->user()->phone }}" />

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
            const previewImage = document.getElementById('preview-image-profile');
            const btnDropPreview = document.getElementById('drop-preview-image');
            const oldPhoto = document.getElementById('old-photo');

            //INPUTS
            const inputDateBirth = document.querySelector('input[name="date"]');
            const inputPhone = document.querySelector('input[name="phone"]');
            const inputName = document.querySelector('input[name="name"]');

            //BOTÃO EDITAR PERFIL
            const btnEditProfile = document.getElementById('btn-edit-profile');
            const icon = btnEditProfile.querySelector('i');
            const span = btnEditProfile.querySelector('span');

            document.getElementById('btn-edit-profile').addEventListener('click', () => {

                if (icon.classList.contains('fa-pen-to-square')) {
                    icon.classList.remove('fa-regular', 'fa-pen-to-square');
                    icon.classList.add('fa-solid', 'fa-xmark');
                    span.textContent = "";

                    inputPhone.removeAttribute('readonly');
                    inputName.removeAttribute('readonly');
                    inputDateBirth.removeAttribute('readonly');
                } else {
                    icon.classList.remove('fa-solid', 'fa-xmark');
                    icon.classList.add('fa-regular', 'fa-pen-to-square');
                    span.textContent = "Editar";

                    inputName.value = document.getElementById('old_name').value;
                    inputPhone.value = document.getElementById('old_phone').value;
                    inputDateBirth.value = document.getElementById('old_datebirth').value;

                    inputPhone.setAttribute('readonly', true);
                    inputName.setAttribute('readonly', true);
                    inputDateBirth.setAttribute('readonly', true);


                    previewImage.src = "";
                    previewImage.setAttribute('hidden', true);
                    btnDropPreview.setAttribute('hidden', true);
                    document.getElementById('span-image').textContent = "Selecionar arquivo";
                    document.getElementById('input-file').value = '';

                }

                document.getElementById('btn-update-profile').classList.toggle('hidden');

            });

            document.getElementById('input-file').addEventListener('change', (e) => {

                document.getElementById('span-image').textContent = e.target.files[0].name || "Arquivo encontrado";

                const file = e.target.files[0];

                if (!file) return;

                const imageUrl = URL.createObjectURL(file);

                previewImage.src = imageUrl;
                previewImage.removeAttribute('hidden');
                btnDropPreview.removeAttribute('hidden');


                if (icon.classList.contains('fa-pen-to-square')) {
                    icon.classList.remove('fa-regular', 'fa-pen-to-square');
                    icon.classList.add('fa-solid', 'fa-xmark');
                    span.textContent = "";

                    inputPhone.removeAttribute('readonly');
                    inputName.removeAttribute('readonly');
                    inputDateBirth.removeAttribute('readonly');
                }

                document.getElementById('btn-update-profile').classList.remove('hidden');

                previewImage.onload = () => {
                    URL.revokeObjectURL(imageUrl);
                };

            });

            document.getElementById('drop-preview-image').addEventListener('click', () => {

                previewImage.src = "";
                previewImage.setAttribute('hidden', true);
                btnDropPreview.setAttribute('hidden', true);
                document.getElementById('span-image').textContent = "Selecionar arquivo";
                document.getElementById('input-file').value = '';

                icon.classList.remove('fa-solid', 'fa-xmark');
                icon.classList.add('fa-regular', 'fa-pen-to-square');
                span.textContent = "Editar";

                inputName.value = document.getElementById('old_name').value;
                inputPhone.value = document.getElementById('old_phone').value;
                inputDateBirth.value = document.getElementById('old_datebirth').value;

                inputPhone.setAttribute('readonly', true);
                inputName.setAttribute('readonly', true);
                inputDateBirth.setAttribute('readonly', true);

                document.getElementById('btn-update-profile').setAttribute('hidden', true);
            });

        </script>
    @endpush

</x-base-layout>


