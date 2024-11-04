@extends('layouts.app')
@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 text-2xl sm:text-3xl font-semibold underline decoration-4 decoration-blue-500">
                {{ __("Olá, " . auth()->user()->name . "!") }}
            </div>
        </div>
    </div>
</div>

<div class="container m-auto py-4 flex flex-col justify-center items-center gap-6">

    <div class="container m-auto max-w-2xl py-4 sm:py-12 px-2 sm:px-4">
        <!-- Título e Linha de Separação -->
        <h1 class="text-4xl font-bold text-[#2e4a67] mb-1">SIMPAC</h1>
        <p class="text-lg text-[#2e4a67] mb-8">Portal do Avaliador</p>

        <!-- Grade de Quadrados -->
        <div class="grid grid-cols-2 gap-6">
            <a href="{{ route('trabalhos.avaliar') }}">
                <div class="bg-gray-300 p-4 rounded-lg text-center text-gray-800 text-sm font-semibold flex items-center justify-center h-32">
                    A Teoria da panderção de princípios e o ativismo Judicial: Uma análise do possível desvirtuamento do princípio da proporcionalidade pelo STF
                </div>
            </a>
            </a>
            <a href="{{ route('trabalhos.avaliar') }}">
                <div class="bg-gray-300 p-4 rounded-lg text-center text-gray-800 text-sm font-semibold flex items-center justify-center h-32">
                    A Teoria da panderção de princípios e o ativismo Judicial: Uma análise do possível desvirtuamento do princípio da proporcionalidade pelo STF
                </div>
            </a>
            </a>
            <a href="{{ route('trabalhos.avaliar') }}">
                <div class="bg-gray-300 p-4 rounded-lg text-center text-gray-800 text-sm font-semibold flex items-center justify-center h-32">
                    A Teoria da panderção de princípios e o ativismo Judicial: Uma análise do possível desvirtuamento do princípio da proporcionalidade pelo STF
                </div>
            </a>
            </a>
            <a href="{{ route('trabalhos.avaliar') }}">
                <div class="bg-gray-300 p-4 rounded-lg text-center text-gray-800 text-sm font-semibold flex items-center justify-center h-32">
                    A Teoria da panderção de princípios e o ativismo Judicial: Uma análise do possível desvirtuamento do princípio da proporcionalidade pelo STF
                </div>
            </a>
        </div>
    </div>
</div>
@endsection