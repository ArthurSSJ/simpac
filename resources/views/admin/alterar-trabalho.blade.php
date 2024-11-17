@extends('layouts.app')
@section('content')
<div class="container m-auto py-4 flex flex-col justify-center items-center gap-6">

    <div class="text-center font-semibold text-blue-950">
        <h2 class="text-2xl">Editar Trabalho</h2>
    </div>

    <form class="max-w-sm mx-auto" method="POST" action="{{ route('trabalhos.update', $trabalho->id) }}">
        @csrf
        @method('POST')
        <div class="mb-5">
            <label for="titulo" class="block font-medium text-gray-900">Título</label>
            <input name="titulo" type="text" id="titulo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Título do trabalho" value="{{ $trabalho->titulo }}" required />
        </div>
        <div class="mb-5">
            <label for="resumo" class="block font-medium text-gray-900">Resumo</label>
            <textarea name="resumo" id="resumo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Resumo do trabalho" required>{{ $trabalho->resumo }}</textarea>
        </div>
        <div class="mb-5">
            <label for="protocolo" class="block font-medium text-gray-900">Protocolo</label>
            <input name="protocolo" type="number" id="protocolo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="123456..." value="{{ $trabalho->protocolo }}" required />
        </div>
        <div class="mb-5">
            <label for="curso" class="block font-medium text-gray-900">Curso</label>
            <select name="curso" id="curso" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="" class="">Selecione um curso</option>
                <option value="adm" class="{{ $trabalho->curso == 'adm' ? 'selected' : '' }}">Administração</option>
                <option value="ads" class="{{ $trabalho->curso == 'ads' ? 'selected' : '' }}">Análise e Desenvolvimento de Sistemas</option>
                <option value="arq" class="{{ $trabalho->curso == 'arq' ? 'selected' : '' }}">Arquitetura e Urbanismo</option>
                <option value="ciencias" class="{{ $trabalho->curso == 'ciencias' ? 'selected' : '' }}">Ciências Contábeis</option>
                <option value="engenharia" class="{{ $trabalho->curso == 'engenharia' ? 'selected' : '' }}">Engenharia Civil</option>
                <option value="direito" class="{{ $trabalho->curso == 'direito' ? 'selected' : '' }}">Direito</option>
                <option value="engenharia" class="{{ $trabalho->curso == 'engenharia' ? 'selected' : '' }}">Engenharia Ambiental</option>
                <option value="engenharia" class="{{ $trabalho->curso == 'engenharia' ? 'selected' : '' }}">Engenharia de Computação</option>
                <option value="engenharia" class="{{ $trabalho->curso == 'engenharia' ? 'selected' : '' }}">Engenharia Química</option>
                <option value="enfermagem" class="{{ $trabalho->curso == 'enfermagem' ? 'selected' : '' }}">Enfermagem</option>
                <option value="farmacia" class="{{ $trabalho->curso == 'farmacia' ? 'selected' : '' }}">Farmácia</option>
                <option value="fisioterapia" class="{{ $trabalho->curso == 'fisioterapia' ? 'selected' : '' }}">Fisioterapia</option>
                <option value="nutricao" class="{{ $trabalho->curso == 'nutricao' ? 'selected' : '' }}">Nutrição</option>
                <option value="odontologia" class="{{ $trabalho->curso == 'odontologia' ? 'selected' : '' }}">Odontologia</option>
                <option value="psicologia" class="{{ $trabalho->curso == 'psicologia' ? 'selected' : '' }}">Psicologia</option>
                <option value="med_veterinaria" class="{{ $trabalho->curso == 'med_veterinaria' ? 'selected' : '' }}">Medicina Veterinária</option>
            </select>
        </div>

        <div class="mb-5">
            <label for="modelo_avaliativo" class="block font-medium text-gray-900">Modelo Avaliativo</label>
            <select id="modelo_avaliativo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="" class="">Selecione um modelo</option>
                <option value="poster" class="{{ $trabalho->modelo_avaliativo == 'poster' ? 'selected' : '' }}">Pôster</option>
                <option value="oral" class="{{ $trabalho->modelo_avaliativo == 'oral' ? 'selected' : '' }}">Oral</option>
            </select>
        </div>

        <div class="mb-5">
            <!-- Lista de avaliadores para atribuição -->
            <label for="avaliadores" class="block font-medium text-gray-900">Selecionar Avaliadores</label>
            <div class="shadow-sm bg-gray-50 border border-gray-300 text-gray-00 rounded-lg block w-full p-2.5" required>
                <p class="font-medium text-gray-900">Selecionar Avaliadores</p>
                @foreach ($avaliadores as $avaliador)
                <div class="flex items-center">
                    <input type="checkbox" name="avaliadores[]" value="{{ $avaliador->id }}" id="avaliador-{{ $avaliador->id }}" class="mr-2"
                        @if (in_array($avaliador->id, $trabalho->avaliadores->pluck('id')->toArray()))
                    checked
                    @endif
                    >
                    <label for="avaliador-{{ $avaliador->id }}" class="text-gray-900">{{ $avaliador->name }}</label>
                </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center">Enviar</button>
    </form>

</div>
@endsection