<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/icon_logo.svg') }}" type="image/svg"/>
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100..900&display=swap" rel="stylesheet">

</head>
<body class="bg-[#1C1A2E]">
    <section class="flex min-h-screen max-lg:flex-col lg:flex-row max-lg:justify-center">
        <div class="lg:basis-7xl flex flex-col min-h-screen">
            {{ $slot }}
        </div>

        <div class="lg:basis-7xl lg:flex justify-center w-dvw max-lg:flex">
            <img class="lg:max-w-[34rem] md:max-w-[25rem]" src="{{ asset('images/image_auth_layout.svg') }}" alt="IMAGEM_AUTH_LOGIN_REGISTER"/>
        </div>
    </section>
</body>
</html>
