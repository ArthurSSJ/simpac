@extends('layouts.app')

@section('content')
<div class="container m-auto py-4 flex flex-col justify-center items-center gap-6">

    <div class="container m-auto max-w-2xl py-4 sm:py-12 px-2 sm:px-4">
        <!-- Título e Linha de Separação -->
        <h1 class="text-4xl font-bold text-[#2e4a67] mb-1">SIMPAC</h1>
        <p class="text-lg text-[#2e4a67] mb-8">Trabalhos</p>
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @elseif (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
        @elseif (session('warning'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
            {{ session('warning') }}
        </div>
        @endif


        @if($trabalhos->isEmpty())
        <p class="text-gray-600">Nenhum trabalho atribuído.</p>
        @else
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Título</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="py-2">Média final</th>
                    <th class="py-2">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trabalhos as $trabalho)
                <tr>
                    <td class="border px-4 py-2"><span class="line-clamp-1 text-wrap">{{ $trabalho->titulo }}</span></td>
                    <td class="border py-2 text-center">
                        @if ($trabalho->avaliado)
                        <span class="text-green-600 font-semibold">Avaliado</span>
                        @else
                        <span class="text-red-600 font-semibold">Pendente</span>
                        @endif
                    </td>
                    <td class="border py-2 text-center w-24">{{ $trabalho->media_final }}</td>
                    <td class="border py-2 text-center w-20">
                        @if ($trabalho->avaliado)
                        <button class="bg-gray-300 text-gray-600 px-4 py-2 rounded cursor-not-allowed" disabled>
                            Avaliar
                        </button>
                        @else
                        <a href="{{ route('avaliador.trabalho.avaliar', $trabalho->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Avaliar
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@endsection