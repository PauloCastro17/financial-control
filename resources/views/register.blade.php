<x-auth-layout>
    <div class="xl:pl-32 xl:pt-8 xl:p-0 sm:p-12">
        <img class="w-32 " src="{{ asset('/images/logo.svg') }}" alt="logo_site" />
    </div>

    <div class="gap-12 justify-center flex flex-col xl:pl-32 xl:pt-8 xl:pb-0 sm:p-12">
        <div class="gap-2 text-white">
            <h1 class="text-4xl">Criar nova conta</h1>
            <p class="opacity-50 text-xl">Insira seus dados logo abaixo.</p>
        </div>

        <form class="flex flex-col justify-between gap-5 text-lg " method="POST" action="{{ route('auth.register') }}">

            <div class="flex flex-col">
                <label for="name">Nome</label>
                <input required name="name" type="text" placeholder="Insira seu nome"  class="w-full border p-3 border-gray-600 rounded-xl"/>

                @error('name')
                    <span class="text-md text-red-400">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="flex flex-col">
                <label for="email">E-mail</label>
                <input required name="email" type="email" placeholder="Insira seu E-mail"  class="w-full border p-3 border-gray-600 rounded-xl"/>

                @error('email')
                    <span class="text-md text-red-400">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="password">Senha</label>
                <input required name="password" type="password" placeholder="********"  class="w-full border border-gray-600 p-3 rounded-xl"/>

                @error('password')
                    <span class="text-md text-red-400">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="password_confirmation">Confirmar senha</label>
                <input required name="password_confirmation" type="password" placeholder="********"  class="w-full border border-gray-600 p-3 rounded-xl"/>

                @error('password_confirmation')
                <span class="text-md text-red-400">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>


            <div class="flex flex-col">
                <input type="submit" value="Entrar"  class="w-full  border border-gray-600  p-3 rounded-xl bg-[#C8EE44] hover:bg-[#A0B84B] transition text-[#1B212D] text-lg font-medium"/>
            </div>

            <span class="text-center"> Já possui uma conta? <a href="{{ route('login') }}" class="underline cursor-pointer">Fazer login</a></span>

        </form>
    </div>
</x-auth-layout>
