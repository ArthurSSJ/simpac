@extends('layouts.app')
@section('content')
<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="container mx-auto py-10 flex flex-col justify-center items-center gap-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800">Iniciar Simpósio</h2>

    <form method="POST" action="{{ route('simposios.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
        @csrf

        <div>
            <label for="nome" class="text-gray-700 font-medium">Título</label>
            <input id="nome" name="nome" required autofocus
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <!-- Exibindo erro (caso exista) -->
            @if ($errors->has('nome')) <!-- Corrigido para name -->
            <span class="mt-2 text-red-600">{{ $errors->first('nome') }}</span>
            @endif
        </div>

        <div class="mt-4">
            <label for="img" class="text-gray-700 font-medium">Imagem (opcional)</label>
            <input id="img" name="img" type="file" accept="image/*"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <!-- Exibindo erro (caso exista) -->
            @if ($errors->has('img'))
            <span class="mt-2 text-red-600">{{ $errors->first('img') }}</span>
            @endif
        </div>

        <div class="mt-4">
            <label for="inicio" class="text-gray-700 font-medium">Inicio</label>
            <input id="inicio" name="inicio" type="datetime-local" required
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <!-- Exibindo erro (caso exista) -->
            @if ($errors->has('inicio'))
            <span class="mt-2 text-red-600">{{ $errors->first('Inicio') }}</span>
            @endif
        </div>

        <div class="mt-6">
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md transition duration-200">
                Iniciar simposio
            </button>
        </div>
    </form>
</div>

@endsection