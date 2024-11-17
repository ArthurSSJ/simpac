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

        <div class="grid grid-cols-2 gap-4 mb-4">
            <!-- Criteria Fields on Left Column -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Fez a introdução de forma clara e objetiva</label>
                <input type="number" class="w-full border-gray-300 rounded-lg text-center" value="0">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Organização Lógica da Apresentação</label>
                <input type="number" class="w-full border-gray-300 rounded-lg text-center" value="0">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Independência do material apresentado</label>
                <input type="number" class="w-full border-gray-300 rounded-lg text-center" value="0">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Clareza e minuciosidade</label>
                <input type="number" class="w-full border-gray-300 rounded-lg text-center" value="0">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Tempo de apresentação</label>
                <input type="number" class="w-full border-gray-300 rounded-lg text-center" value="0">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Conclusões finais</label>
                <input type="number" class="w-full border-gray-300 rounded-lg text-center" value="0">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end gap-4">
            <div>
                <label class="text-gray-600 font-semibold">Nota</label>
                <input type="number" class="border-gray-300 rounded-lg text-center w-20 ml-2" value="0">
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                Enviar
            </button>
        </div>
    </div>
</div>
@endsection