<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/icon_logo.svg') }}" type="image/svg"/>
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100..900&display=swap" rel="stylesheet">
</head>
<body class="bg-[#1C1A2E]">
    <section class="flex min-h-screen w-full max-lg:flex-col lg:flex-row max-lg:justify-center">

        <x-sidebar :sub-pag-menu="$subPagMenu" />

        {{ $slot }}
    </section>

    @vite(['resources/js/app.js'])
</body>
</html>
