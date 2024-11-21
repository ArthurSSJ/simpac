@extends('layouts.app')

@section('content')
<div class="container m-auto py-4 flex flex-col justify-center items-center gap-6">

    <div class="container m-auto max-w-2xl py-4 sm:py-12 px-2 sm:px-4">
        <!-- Título e Linha de Separação -->
        <div class="flex w-full flex-col items-center mb-4">
            <h1 class="text-4xl font-bold text-[#2e4a67] mb-1">SIMPAC</h1>
            <div class="border-t-2 border-black w-24"></div>
            <p class="text-lg text-[#2e4a67]">Seus Trabalhos</p>
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


        <div>
            <!-- Trabalhos Pendentes -->
            <h3 class="text-xl font-semibold mb-4">Trabalhos Pendentes</h3>
            @if($trabalhos->where('avaliado', false)->isEmpty())
            <p class="text-gray-600">Nenhum trabalho pendente.</p>
            @else
            <table class="table-auto w-full mb-6">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Título</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="py-2 sm:w-24">Média final</th>
                        <th class="py-2">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trabalhos->where('avaliado', false) as $trabalho)
                    <tr>
                        <td class="border px-4 py-2 sm:w-7/12 cursor-pointer" onclick="openModal({{ $trabalho->id }})"><span class="line-clamp-2 sm:line-clamp-1 text-wrap text-sm sm:text-base">{{ $trabalho->titulo }}</span></td>
                        <td class="border py-2 text-center">
                            <span class="text-red-600 font-semibold">Pendente</span>
                        </td>
                        <td class="border py-2 text-center w-20">{{ number_format($trabalho->media_final, 2, ',', '.') }}</td>
                        <td class="border py-2 text-center w-20">
                            <a href="{{ route('avaliador.trabalho.avaliar', $trabalho->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                                Avaliar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            <!-- Trabalhos Avaliados -->
            <h3 class="text-xl font-semibold mb-4">Trabalhos Avaliados</h3>
            @if($trabalhos->where('avaliado', true)->isEmpty())
            <p class="text-gray-600">Nenhum trabalho avaliado.</p>
            @else
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Título</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="py-2 sm:w-24">Média final</th>
                        <th class="py-2">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trabalhos->where('avaliado', true) as $trabalho)
                    <tr>
                        <td class="border px-4 py-2 sm:w-7/12">
                            <span class="line-clamp-2 sm:line-clamp-1 text-wrap text-sm sm:text-base">{{ $trabalho->titulo }}</span>
                        </td>
                        <td class="border py-2 text-center">
                            <span class="text-green-600 font-semibold">Avaliado</span>
                        </td>
                        <td class="border py-2 text-center w-20">{{ number_format($trabalho->media_final, 2, ',', '.') }}</td>
                        <td class="border py-2 text-center w-20" onclick="openModal({{ $trabalho->id }})">
                            <span class="bg-green-300 px-2 py-2 rounded cursor-pointer hover:bg-green-400">Detalhes</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
<!-- Modal de Detalhes do Trabalho -->
<div id="modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden justify-center items-center z-50 flex">
    <div class="bg-white p-6 rounded-lg w-96 m-auto">
        <h3 class="text-xl font-semibold mb-4">Detalhes do Trabalho</h3>

        <div class="overflow-x-hidden">
            <p class="mb-3"><strong>Título:</strong> <span id="modal-titulo"></span></p>
            <div class="w-full">
                <p class="mb-5 text-wrap break-words"><strong>Resumo:</strong> <span id="modal-resumo" class="text-wrap"></span></p>
            </div>
            <div class="grid grid-cols-2 gap-y-3">
                <p class="flex flex-col uppercase"><strong class="text-sm">Curso:</strong> <span id="modal-curso"></span></p>
                <p class="flex flex-col uppercase"><strong class="text-sm">Protocolo:</strong> <span id="modal-protocolo"></span></p>
                <p class="flex flex-col uppercase"><strong class="text-sm">Modelo Avaliativo:</strong><span id="modal-modelo_avaliativo"></span></p>
                <p class="flex flex-col uppercase"><strong class="text-sm">Média Final:</strong> <span id="modal-media_final"></span></p>
            </div>
        </div>

        <div class="mt-4 w-full flex justify-end">
            <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded">
                Fechar
            </button>
        </div>
    </div>
</div>
<script>
    // Função para abrir o modal e preencher os dados do trabalho
    function openModal(trabalhoId) {
        // Faz uma requisição para pegar as informações do trabalho
        fetch(`/trabalho/${trabalhoId}/detalhes`)
            .then(response => response.json())
            .then(data => {
                // Preenche o modal com os dados
                document.getElementById('modal-titulo').innerText = data.titulo;
                document.getElementById('modal-resumo').innerText = data.resumo;
                document.getElementById('modal-curso').innerText = data.curso;
                document.getElementById('modal-protocolo').innerText = data.protocolo;
                document.getElementById('modal-modelo_avaliativo').innerText = data.modelo_avaliativo;
                document.getElementById('modal-media_final').innerText = data.media_final;

                // Exibe o modal
                document.getElementById('modal').classList.remove('hidden');
            })
            .catch(error => console.error('Erro ao carregar os detalhes do trabalho:', error));
    }

    // Função para fechar o modal
    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
</script>

@endsection