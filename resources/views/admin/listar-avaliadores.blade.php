@extends('layouts.app')

@section('content')
<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="container m-auto max-w-xl py-4 flex flex-col justify-center items-center gap-6">
    <!-- Título e Linha de Separação -->
    <div class="flex justify-between items-center mb-8 w-full">
        <div class="flex flex-col justify-between items-center">
            <h1 class="text-4xl font-bold text-[#2e4a67] mb-1">SIMPAC</h1>
            <div class="border-t-2 border-black w-24 mx-auto"></div>
            <p class="text-lg text-[#2e4a67">Lista de Avaliadores</p>
        </div>
        <div class="">
            <a href="{{ route('avaliadores.create') }}" class="bg-[#2e4a67] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#2e4a67]/90">Cadastrar Avaliador</a>
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

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Ações</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @if (is_iterable($avaliadores))
            @foreach($avaliadores as $avaliador)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $avaliador->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $avaliador->email }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                    <div class="flex items-center justify-center gap-2">
                        <a href="{{ route('avaliadores.edit', $avaliador->id) }}" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-semibold">Editar</a>
                        <form action="{{ route('avaliadores.destroy', $avaliador->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-semibold"
                                onclick="return confirm('Deseja excluir este avaliador?')">
                                Excluir
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="3" class="px-6 py-4 text-gray-900 text-center">Nenhum avaliador encontrado.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection