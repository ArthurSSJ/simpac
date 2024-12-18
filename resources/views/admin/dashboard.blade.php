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

    <div class="text-center font-semibold text-blue-950">
        <h2 class="text-xl">Área do Administrador</h2>
    </div>

    <div class="flex flex-col gap-8 w-full max-w-80 px-4">
        <a href="{{ route('simposios.index') }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">Simposios</a>

        <a href="{{ route('trabalhos.all') }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">Trabalhos</a>

        <a href="{{ route('avaliadores.index') }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">Avaliadores</a>

        <a href="{{ route('cursos') }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">Resultados</a>

        <a href="{{ route('home') }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">Página inicial</a>
    </div>
</div>
@endsection