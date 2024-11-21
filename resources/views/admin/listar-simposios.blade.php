@extends('layouts.app')

@section('content')
<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="container m-auto max-w-xl py-4 flex flex-col justify-center items-center gap-6">
    <!-- Título e Linha de Separação -->
    <div class="flex justify-between items-center mb-8 w-full">
        <div class="flex flex-col justify-between items-center">
            <h1 class="text-4xl font-bold text-[#2e4a67] mb-1">SIMPAC</h1>
            <div class="border-t-2 border-black w-24 mx-auto"></div>
            <p class="text-lg text-[#2e4a67">Simposios</p>
        </div>
        <div class="">
            <a href="{{ route('simposios.create') }}" class="bg-[#2e4a67] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#2e4a67]/90">Iniciar Simposio</a>
        </div>
    </div>


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


    <!-- Grade de Quadrados -->
    @if($simposios->isEmpty())
    <p class="text-gray-600">Nenhum simposio iniciado.</p>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @foreach ($simposios as $simposio)
        <a href="{{ route('simposios.edit', $simposio->id) }}">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="border-b border-gray-300 mb-4">
                    <img
                        src="{{ $simposio->imagem ? asset('storage/' . $simposio->imagem) : asset('images/simposio-default.jpg') }}"
                        alt="Imagem do Simpósio"
                        class="w-full h-auto">
                </div>
                <h2 class="text-center text-xl font-bold mb-4">{{ $simposio->nome }}</h2>
                <p class="text-center text-gray-600 mb-4 font-semibold">{{ date('d/m/Y H:i', strtotime($simposio->inicio)) }}</p>
            </div>
        </a>
        @endforeach
    </div>
    @endif
</div>
@endsection