@extends('layouts.app')
@section('content')
<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl w-full">
        <h2 class="text-center text-xl font-bold mb-4">Área de Avaliação</h2>
        <div class="border-b border-gray-300 mb-4"></div>

        <div class="flex justify-between items-stretch mb-4 gap-4 sm:gap-8">
            <!-- Tema Section -->
            <div class="w-full h-full flex flex-col items-stretch">
                <p class="text-gray-600 font-semibold text-center text-lg">Tema</p>
                <div class="bg-gray-200 text-gray-700 p-2 rounded h-full">
                    <p class="h-full">A Teoria da panderção de princípios e o ativismo Judicial: Uma análise do possível desvirtuamento do princípio da proporcionalidade pelo STF</p>
                </div>
            </div>

            <!-- Protocolo and Avaliador Section -->
            <div class="flex flex-col justify-around">
                <div class="mb-2">
                    <p class="text-gray-600 font-semibold text-center text-lg">Protocolo</p>
                    <div class="bg-gray-200 text-sm text-gray-700 p-2 rounded text-center"><span>018</span></div>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold text-center text-lg">Avaliador</p>
                    <div class="bg-gray-200 text-sm text-gray-700 p-2 rounded text-center"><span>Hermes</span></div>
                </div>
            </div>
        </div>

        <form action="{{ route('avaliador.trabalho.avaliar', $trabalho->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <!-- Criteria Fields -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Fez a introdução de forma clara e objetiva</label>
                    <input type="number" class="w-full border-gray-300 rounded-lg text-center" value="0" min="0" max="10"
                        step="any" oninput="validateInput(this)" data-index="0">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Organização Lógica da Apresentação</label>
                    <input type="number" class="w-full border-gray-300 rounded-lg text-center" value="0" min="0" max="10"
                        step="any" oninput="validateInput(this)" data-index="1">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Independência do material apresentado</label>
                    <input type="number" class="w-full border-gray-300 rounded-lg text-center" value="0" min="0" max="10"
                        step="any" oninput="validateInput(this)" data-index="2">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Clareza e minuciosidade</label>
                    <input type="number" class="w-full border-gray-300 rounded-lg text-center" value="0" min="0" max="10"
                        step="any" oninput="validateInput(this)" data-index="3">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Tempo de apresentação</label>
                    <input type="number" class="w-full border-gray-300 rounded-lg text-center" value="0" min="0" max="10"
                        step="any" oninput="validateInput(this)" data-index="4">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Conclusões finais</label>
                    <input type="number" class="w-full border-gray-300 rounded-lg text-center" value="0" min="0" max="10"
                        step="any" oninput="validateInput(this)" data-index="5">
                </div>
            </div>
            <!-- Submit Button -->
            <div class="flex items-center justify-end gap-4">
                <div>
                    <label class="text-gray-600 font-semibold">Nota</label>
                    <input id="nota-final" type="text" class="border-gray-300 rounded-lg text-center w-20 ml-2" value="0" readonly>
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Enviar
                </button>
            </div>
        </form>
        <script>
            var notas = [0, 0, 0, 0, 0, 0];

            function atualizaNotas(index, value) {
                // Converte o valor para número e atualiza a lista de notas
                notas[index] = Number(value) || 0;
                // Soma as notas e calcula a média
                var soma = notas.reduce((total, nota) => total + nota, 0);
                var notaFinal = (soma / notas.length).toFixed(2);
                // Atualiza o campo de nota final
                document.getElementById('nota-final').value = notaFinal;
            }

            function validateInput(input) {
                var value = input.value;

                // Substitui vírgula por ponto
                value = value.replace(',', '.');

                // Remove caracteres não numéricos, exceto um único ponto
                value = value.replace(/[^0-9.]/g, '');

                // Garante que apenas o primeiro ponto seja permitido
                var partes = value.split('.');
                if (partes.length > 2) {
                    value = partes[0] + '.' + partes[1];
                }

                // Atualiza o valor do campo
                input.value = value;

                // Opcionalmente atualiza a soma se o valor for válido
                if (value !== '') {
                    atualizaNotas(parseInt(input.dataset.index), value);
                }
            }
        </script>
    </div>
</div>
@endsection