<x-base-layout>

    <section>
        @session('success')
        <p>{{ session('success') }}</p>
        @endsession

        <x-header pag-menu="Dashboard"/>


        {{--<h1>DASHBOARD</h1>--}}
    </section>

</x-base-layout>
