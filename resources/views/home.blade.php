@extends('layouts.app') <!-- Certifique-se de que o caminho está correto -->

@section('content')
<div class="bg-gray-50 text-black/50">
    <div class="relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="grid grid-cols-2 items-center gap-2 lg:grid-cols-3">
                <!-- @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end text-black">
                    @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Dashboard
                    </a>
                    @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Log in
                    </a>

                    @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Register
                    </a>
                    @endif
                    @endauth
                </nav>
                @endif -->
            </header>

            <main class="">
                <div class="container m-auto max-w-xs py-4 flex flex-col justify-center items-center gap-6">

                    <img src="{{ asset('images/univicosa-hori.svg') }}" alt="" class="w-2/3 max-w-56">


                    <div class="text-center font-semibold text-blue-950">
                        <h2 class="text-xl">Simpac</h2>
                        <h3 class="text-3xl">Boas-Vindas</h3>
                    </div>

                    <a href="{{ route('login.admin') }}" class="w-full bg-blue-900 px-2 py-3 rounded-lg text-xl text-center text-white hover:bg-blue-800">
                        Administrador
                    </a>

                    <a href="{{ route('login.avaliador') }}" class="w-full bg-blue-900 px-2 py-3 rounded-lg text-xl text-center text-white hover:bg-blue-800">
                        Avaliador
                    </a>

                    <a href="https://www.univicosa.com.br/uninoticias/noticia/c0983646-c068-40cf-b117-ee3adc553948"  target="blank" class=" w-full bg-blue-900 px-2 py-3 rounded-lg text-xl text-center text-white hover:bg-blue-800">
                        Resumo dos aprovados
                    </a>
                </div>
            </main>

        </div>
    </div>
</div>
@endsection