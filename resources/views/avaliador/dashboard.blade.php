@extends('layouts.app')
@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Inicio') }}
    </h2>
</x-slot>

<div class="container m-auto py-4 flex flex-col justify-center items-center gap-6">

    <div class="container m-auto max-w-2xl py-4 sm:py-12 px-2 sm:px-4">
        <!-- Título e Linha de Separação -->
        <h1 class="text-4xl font-bold text-[#2e4a67] mb-1">SIMPAC</h1>
        <p class="text-lg text-[#2e4a67] mb-8">Portal do Avaliador</p>

        <div class="container m-auto py-4 flex flex-col justify-center items-center gap-6">

            <div class="flex flex-col gap-8 w-full max-w-80 px-4">
                <a href="{{ route('trabalho.index') }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">Avaliar</a>

                <a href="{{ route('trabalho.index') }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">Trabalhos avaliados</a>

                <a href="{{ route('resultados') }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">Resultados</a>

                <a href="{{ route('home') }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">Página inicial</a>
            </div>
        </div>
    </div>
</div>
@endsection