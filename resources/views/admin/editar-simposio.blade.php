@extends('layouts.app')
@section('content')

<div class="container m-auto max-w-2xl py-4 sm:py-12 px-2 sm:px-4">
    <!-- Botão para abrir modal -->
    <div class="flex flex-col justify-between items-center gap-2">
        <div class="flex justify-between items-center w-full">
            <div class="flex flex-col justify-between items-center">
                <h1 class="text-4xl font-bold text-[#2e4a67] mb-1">SIMPAC</h1>
                <div class="border-t-2 border-black w-24 mx-auto"></div>
                <p class="text-lg text-[#2e4a67">Trabalhos</p>
            </div>
            <button id="editarSimposioBtn" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 focus:outline-none">
                Editar Simpósio
            </button>
        </div>

        <img src="{{asset('images/simposio-default.jpg')}}" alt="" class="w-2/5">


    </div>

    <!-- Modal de Editar Simpósio -->
    <div id="editarSimposioModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
            <button id="fecharModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none text-xl">
                ✖
            </button>
            <h3 class="text-xl font-bold mb-4">Editar Simpósio</h3>
            <form action="{{ route('simposios.update', $simposio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="mb-4">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Simpósio</label>
                    <input type="text" id="nome" name="nome" value="{{ $simposio->nome }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="inicio" class="block text-sm font-medium text-gray-700">Data de Início</label>
                    <input type="date" id="inicio" name="inicio" value="{{ $simposio->inicio }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="imagem" class="block text-sm font-medium text-gray-700">Atualizar Imagem do Simpósio</label>
                    <input type="file" id="imagem" name="imagem" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @if ($simposio->imagem)
                    <p class="mt-2">Imagem Atual:</p>
                    <img src="{{ asset('storage/' . $simposio->imagem) }}" alt="Imagem do Simpósio" class="h-32 mt-2">
                    @endif
                </div>

                <button type="submit" class="bg-blue-600 w-full text-white px-4 py-2 rounded">Salvar Alterações</button>
            </form>
        </div>
    </div>

    <div class="container m-auto max-w-2xl py-4 sm:py-12 px-2 sm:px-4">
        <!-- Título e Linha de Separação -->
        <div class="flex justify-between items-center mb-8">
            <div class="flex flex-col justify-between items-center">
                <h1 class="text-4xl font-bold text-[#2e4a67] mb-1">SIMPAC</h1>
                <div class="border-t-2 border-black w-24 mx-auto"></div>
                <p class="text-lg text-[#2e4a67">Trabalhos</p>
            </div>
            <div class="">
                <a href="{{ route('trabalhos.store', $simposio->id) }}" class="bg-[#2e4a67] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#2e4a67]/90">Criar Trabalho</a>
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

        @if($trabalhos->isEmpty())
        <p class="text-gray-600">Nenhum trabalho atribuido a este simpósio.</p>
        @else
        <table class="table-auto w-full border">
            <thead>
                <tr>
                    <th class="px-4 py-2">Título</th>
                    <th class="py-2">Média final</th>
                    <th class="py-2">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trabalhos as $trabalho)
                <tr>
                    <td class="border-y px-4 py-4"><span class="line-clamp-1 text-wrap">{{ $trabalho->titulo }}</span></td>
                    <td class="border-y py-2 text-center w-24">{{ $trabalho->media_final }}</td>
                    <td class="border-y text-center w-20">
                        <a href="{{ route('trabalhos.edit', $trabalho->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">
                            Editar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <!-- Botão para finalizar simpósio -->
    <div class="mt-8">
        <form action="{{ route('simposios.finalizar', $simposio->id) }}" method="POST">
            @csrf
            @method('POST')
            <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Finalizar Simpósio</button>
        </form>
    </div>
</div>

<!-- Script para abrir e fechar o modal -->
<script>
    const editarSimposioBtn = document.getElementById('editarSimposioBtn');
    const editarSimposioModal = document.getElementById('editarSimposioModal');
    const fecharModal = document.getElementById('fecharModal');

    editarSimposioBtn.addEventListener('click', () => {
        editarSimposioModal.classList.remove('hidden');
    });

    fecharModal.addEventListener('click', () => {
        editarSimposioModal.classList.add('hidden');
    });
</script>
@endsection