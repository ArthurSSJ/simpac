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
            <textarea name="titulo" type="text" id="titulo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Título do trabalho" required>{{ $trabalho->titulo }}</textarea>
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
                <option value="" disabled class="">Selecione um curso</option>
                <option value="adm" {{ $trabalho->curso == 'adm' ? 'selected' : '' }}>Administração</option>
                <option value="ads" {{ $trabalho->curso == 'ads' ? 'selected' : '' }}>Análise e Desenvolvimento de Sistemas</option>
                <option value="arq" {{ $trabalho->curso == 'arq' ? 'selected' : '' }}>Arquitetura e Urbanismo</option>
                <option value="cco" {{ $trabalho->curso == 'cco' ? 'selected' : '' }}>Ciências Contábeis</option>
                <option value="civ" {{ $trabalho->curso == 'civ' ? 'selected' : '' }}>Engenharia Civil</option>
                <option value="dir" {{ $trabalho->curso == 'dir' ? 'selected' : '' }}>Direito</option>
                <option value="eab" {{ $trabalho->curso == 'eab' ? 'selected' : '' }}>Engenharia Ambiental</option>
                <option value="eco" {{ $trabalho->curso == 'eco' ? 'selected' : '' }}>Engenharia de Computação</option>
                <option value="enf" {{ $trabalho->curso == 'enf' ? 'selected' : '' }}>Enfermagem</option>
                <option value="enq" {{ $trabalho->curso == 'enq' ? 'selected' : '' }}>Engenharia Química</option>
                <option value="far" {{ $trabalho->curso == 'far' ? 'selected' : '' }}>Farmácia</option>
                <option value="fisio" {{ $trabalho->curso == 'fisio' ? 'selected' : '' }}>Fisioterapia</option>
                <option value="nut" {{ $trabalho->curso == 'nut' ? 'selected' : '' }}>Nutrição</option>
                <option value="odo" {{ $trabalho->curso == 'odo' ? 'selected' : '' }}>Odontologia</option>
                <option value="psi" {{ $trabalho->curso == 'psi' ? 'selected' : '' }}>Psicologia</option>
                <option value="vet" {{ $trabalho->curso == 'vet' ? 'selected' : '' }}>Medicina Veterinária</option>
            </select>
        </div>

        <div class="mb-5">
            <label for="modelo_avaliativo" class="block font-medium text-gray-900">Modelo Avaliativo</label>
            <select name="modelo_avaliativo" id="modelo_avaliativo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="" disabled>Selecione um modelo</option>
                <option value="poster" {{ $trabalho->modelo_avaliativo == 'poster' ? 'selected' : '' }}>Pôster</option>
                <option value="oral" {{ $trabalho->modelo_avaliativo == 'oral' ? 'selected' : '' }}>Oral</option>
            </select>
        </div>

        <div class="mb-5">
            <!-- Lista de avaliadores para atribuição -->
            <label for="avaliadores" class="block font-medium text-gray-900">Selecionar Avaliadores</label>
            <div class="shadow-sm bg-gray-50 border border-gray-300 text-gray-00 rounded-lg block w-full p-2.5" required>
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

        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center">Salvar alterações</button>
    </form>

</div>
@endsection