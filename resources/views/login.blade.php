<x-auth-layout>
    <div class="xl:pl-32 xl:pt-14 sm:p-12">
        <img class="w-32 " src="{{ asset('/images/logo.svg') }}" alt="logo_site" />
    </div>

    <div class="gap-12 justify-center flex flex-col xl:pl-32 xl:pt-22 sm:p-12">
        <div class="gap-2 text-white">
            <h1 class="text-4xl">Bem-vindo de volta</h1>
            <p class="opacity-50 text-xl">Faça o login logo abaixo.</p>
        </div>

        <form class="flex flex-col justify-between gap-5 text-lg " method="POST" action="{{ route('auth.login') }}">
            @csrf

            <div class="flex flex-col gap-1">
                <label for="email" class="font-bold">E-mail</label>
                <input required type="email" name="email" placeholder="Insira seu E-mail"  class="w-full border p-3 border-gray-600 rounded-xl @error('email') border-red-500 @enderror"/>

                @error('email')
                    <span class="text-md text-red-400">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="flex flex-col gap-1">
                <label for="password" class="font-bold">Senha</label>
                <input required type="password" name="password" placeholder="********"  class="w-full border border-gray-600 p-3 rounded-xl @error('password') border-red-500 @enderror"/>

                @error('password')
                    <span class="text-md text-red-400">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="flex flex-col">
                <input type="submit" value="Entrar"  class="w-full cursor-pointer border border-gray-600  p-3 rounded-xl bg-[#C8EE44] hover:bg-[#A0B84B] transition text-[#1B212D] text-lg font-bold"/>
            </div>

            <span class="text-center text-[#929EAE]"> Não possui uma conta? <a href="{{ route('register') }}" class="underline cursor-pointer font-bold text-white">Registre-se aqui</a></span>

        </form>
    </div>
</x-auth-layout>
