@extends('layouts.app')
@section('content')
<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="container mx-auto py-10 flex flex-col justify-center items-center gap-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800">Cadastrar Avaliador</h2>

    <form method="POST" action="{{ route('avaliadores.store') }}" class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
        @csrf

        <div>
            <label for="name" class="text-gray-700 font-medium">Nome</label>
            <input id="name" name="name" required autofocus
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <!-- Exibindo erro (caso exista) -->
            @if ($errors->has('name')) <!-- Corrigido para name -->
            <span class="mt-2 text-red-600">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="mt-4">
            <label for="email" class="text-gray-700 font-medium">Email</label>
            <input id="email" name="email" type="email" required
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <!-- Exibindo erro (caso exista) -->
            @if ($errors->has('email'))
            <span class="mt-2 text-red-600">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="mt-4">
            <label for="password" class="text-gray-700 font-medium">Senha</label>
            <input id="password" name="password" type="password" required
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <!-- Exibindo erro (caso exista) -->
            @if ($errors->has('password'))
            <span class="mt-2 text-red-600">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="text-gray-700 font-medium">Confirmar Senha</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div class="mt-6">
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md transition duration-200">
                Cadastrar Avaliador
            </button>
        </div>
    </form>
</div>

@endsection