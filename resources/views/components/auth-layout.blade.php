<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#1C1A2E]">
    <section class="flex justify-between min-h-screen">
        <div class="basis-7xl flex flex-col min-h-screen">
            {{ $slot }}
        </div>

        <div class="basis-7xl flex justify-center w-dvw items-center">
            <img class="max-w-[34.5rem] " src="{{ asset('images/image_auth_layout.svg') }}" alt="IMAGEM_AUTH_LOGIN_REGISTER"/>
        </div>
    </section>
</body>
</html>
