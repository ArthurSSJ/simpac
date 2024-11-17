@extends('layouts.app')

@section('content')
<div class="container m-auto py-4 flex flex-col justify-center items-center gap-6">

    <div class="container m-auto max-w-2xl py-4 sm:py-12 px-2 sm:px-4">
        <!-- Título e Linha de Separação -->
        <h1 class="text-4xl font-bold text-[#2e4a67] mb-1">SIMPAC</h1>
        <p class="text-lg text-[#2e4a67] mb-8">Trabalhos</p>

        <!-- Grade de Quadrados -->
        <div class="grid grid-cols-2 gap-6">

            @foreach ($trabalhos as $trabalho)
            <a href="{{ route('trabalho.avaliar', $trabalho->id) }}">
                <div class="bg-gray-300 p-4 rounded-lg text-center text-gray-800 text-sm font-semibold flex items-center justify-center h-32 hover:bg-gray-400 transition-all">
                    {{ $trabalho->resumo }}
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

@endsection