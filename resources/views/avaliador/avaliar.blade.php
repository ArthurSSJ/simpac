@extends('layouts.app')
@section('content')
<div class="container m-auto max-w-2xl  py-4 sm:py-12 px-2 sm:px-4">
    <h2 class="text-2xl font-semibold text-center mb-4">Área de Avaliação</h2>
    <div class="text-center mb-6">
        <p><strong>Tema:</strong> A Teoria da panderação de princípios e o ativismo Judicial: Uma análise do possível desvirtuamento do princípio da proporcionalidade pelo STF</p>
        <p><strong>Protocolo:</strong> 018</p>
        <p><strong>Avaliador:</strong> Eliene</p>
    </div>

    <form class="grid grid-cols-1 sm:grid-cols-2 gap-x-6">
        <div class="mb-4">
            <label for="introducao" class="block font-medium mb-1">Fez a introdução de forma clara e objetiva</label>
            <input type="number" id="introducao" name="introducao" min="0" max="10" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="organizacao" class="block font-medium mb-1">Organização Lógica da Apresentação</label>
            <input type="number" id="organizacao" name="organizacao" min="0" max="10" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="clareza" class="block font-medium mb-1">Clareza e minuciosidade</label>
            <input type="number" id="clareza" name="clareza" min="0" max="10" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="independencia" class="block font-medium mb-1">Independência do material apresentado</label>
            <input type="number" id="independencia" name="independencia" min="0" max="10" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="conclusoes" class="block font-medium mb-1">Conclusões finais</label>
            <input type="number" id="conclusoes" name="conclusoes" min="0" max="10" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="tempo" class="block font-medium mb-1">Tempo de apresentação</label>
            <input type="number" id="tempo" name="tempo" min="0" max="10" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="nota-final" class="block font-medium mb-1">Nota</label>
            <input type="number" id="nota-final" name="nota-final" min="0" max="10" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="text-center mt-6">
            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">
                Enviar
            </button>
        </div>
    </form>
</div>
@endsection