@extends('layouts.app')
@section('content')
<div class="container m-auto py-4 flex flex-col justify-center items-center gap-6">

    <div class="text-center font-semibold text-blue-950">
        <h2 class="text-2xl">Criar trabalhos</h2>
    </div>
    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @elseif (session('warning'))
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
        {{ session('warning') }}
    </div>
    @endif
    <form class="max-w-sm mx-auto" method="POST" action="{{ route('trabalhos.store') }}">
        @csrf
        <div class="mb-5">
            <label for="titulo" class="block font-medium text-gray-900">Título</label>
            <input name="titulo" type="text" id="titulo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Título do trabalho" required />
        </div>
        <div class="mb-5">
            <label for="resumo" class="block font-medium text-gray-900">Resumo</label>
            <textarea name="resumo" id="resumo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Resumo do trabalho" required></textarea>
        </div>
        <div class="mb-5">
            <label for="protocolo" class="block font-medium text-gray-900">Protocolo</label>
            <input name="protocolo" type="number" id="protocolo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="123456..." required />
        </div>
        <div class="mb-5">
            <label for="curso" class="block font-medium text-gray-900">Curso</label>
            <select name="curso" id="curso" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="">Selecione um curso</option>
                <option value="adm">Administração</option>
                <option value="ads">Análise e Desenvolvimento de Sistemas</option>
                <option value="arq">Arquitetura e Urbanismo</option>
                <option value="cco">Ciências Contábeis</option>
                <option value="civ">Engenharia Civil</option>
                <option value="dir">Direito</option>
                <option value="eab">Engenharia Ambiental</option>
                <option value="eco">Engenharia de Computação</option>
                <option value="enf">Enfermagem</option>
                <option value="enq">Engenharia Química</option>
                <option value="far">Farmácia</option>
                <option value="fisio">Fisioterapia</option>
                <option value="nut">Nutrição</option>
                <option value="odo">Odontologia</option>
                <option value="psi">Psicologia</option>
                <option value="vet">Medicina Veterinária</option>
            </select>
        </div>

        <div class="mb-5">
            <label for="modelo_avaliativo" class="block font-medium text-gray-900">Modelo Avaliativo</label>
            <select name="modelo_avaliativo" id="modelo_avaliativo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="" class="">Selecione um modelo</option>
                <option value="poster" class="">Pôster</option>
                <option value="oral" class="">Oral</option>
            </select>
        </div>

        <div class="mb-5">
            <!-- Lista de avaliadores para atribuição -->
            <label for="avaliadores" class="block font-medium text-gray-900">Selecionar Avaliadores</label>
            <div class="shadow-sm bg-gray-50 border border-gray-300 text-gray-00 rounded-lg block w-full p-2.5" required>
                <p class="font-medium text-gray-900">Selecionar Avaliadores</p>
                @foreach ($avaliadores as $avaliador)
                <div class="flex items-center">
                    <input type="checkbox" name="avaliadores[]" value="{{ $avaliador->id }}" id="avaliador-{{ $avaliador->id }}" class="mr-2">
                    <label for="avaliador-{{ $avaliador->id }}" class="text-gray-900">{{ $avaliador->name }}</label>
                </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center">Enviar</button>
    </form>


</div>
@endsection