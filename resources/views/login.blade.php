<x-auth-layout>
    <div class="pl-32 pt-14">
        <img class="w-32 " src="{{ asset('/images/logo.svg') }}" alt="logo_site" />
    </div>

    <div class="gap-12 justify-center flex flex-col pl-32 pt-24">
        <div class="gap-2 text-white">
            <h1 class="text-4xl">Bem-vindo de volta</h1>
            <p class="opacity-50 text-xl">Faça o login logo abaixo.</p>
        </div>

        <form class="flex flex-col justify-between gap-5 text-lg ">

            <div class="flex flex-col">
                <span>E-mail</span>
                <input type="email" placeholder="Insira seu E-mail"  class="w-full border p-3 border-gray-600 rounded-xl"/>
            </div>

            <div class="flex flex-col">
                <span>Senha</span>
                <input type="password" placeholder="********"  class="w-full border border-gray-600 p-3 rounded-xl"/>
            </div>

            <div class="flex justify-end">

                <a class="underline cursor-pointer">Esqueceu a senha?</a>
            </div>

            <div class="flex flex-col">
                <input type="submit" value="Entrar"  class="w-full  border border-gray-600 text-black text-lg  p-3 rounded-xl bg-[#C8EE44]"/>
            </div>

            <span class="text-center"> Já possui uma conta? <a class="underline cursor-pointer">Fazer login</a></span>

        </form>
    </div>
</x-auth-layout>
