@extends('layouts.app')
@section('content')
<div class="container m-auto py-4 flex flex-col justify-center items-center gap-6">

    <div class="text-center font-semibold text-blue-950">
        <h2 class="text-2xl">Criar trabalhos</h2>
    </div>

    <form class="max-w-sm mx-auto">
        <div class="mb-5">
            <label for="protocolo" class="block font-medium text-gray-900">Protocolo</label>
            <input name="protocolo" type="number" id="protocolo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="123456..." required />
        </div>
        <div class="mb-5">
            <label for="resumo" class="block font-medium text-gray-900">Resumo</label>
            <textarea name="resumo" id="resumo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Resumo do trabalho" required></textarea>
        </div>
        <div class="mb-5">
            <label for="curso" class="block font-medium text-gray-900">Curso</label>
            <select id="curso" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="" class="">Selecione um curso</option>
                <option value="adm" class="">Administração</option>
                <option value="ads" class="">Análise e Desenvolvimento de Sistemas</option>
                <option value="" class="">Arquitetura e Urbanismo</option>
                <option value="" class="">Ciências Contábeis</option>
                <option value="" class="">Engenharia Civil</option>
                <option value="" class="">Direito</option>
                <option value="" class="">Engenharia Ambiental</option>
                <option value="" class="">Engenharia de Computação</option>
                <option value="" class="">Engenharia Química</option>
                <option value="" class="">Enfermagem</option>
                <option value="" class="">Farmácia</option>
                <option value="" class="">Fisioterapia</option>
                <option value="" class="">Nutrição</option>
                <option value="" class="">Odontologia</option>
                <option value="" class="">Psicologia</option>
                <option value="" class="">Medicina Veterinária</option>
            </select>
        </div>

        <div class="mb-5">
            <label for="modelo_avaliativo" class="block font-medium text-gray-900">Modelo Avaliativo</label>
            <select id="modelo_avaliativo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="" class="">Selecione um modelo</option>
                <option value="poster" class="">Pôster</option>
                <option value="oral" class="">Oral</option>
            </select>
        </div>

        <div class="mb-5">
            <label for="avaliadores" class="block font-medium text-gray-900">Selecionar Avaliadores</label>
            <select id="avaliadores" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-00 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="" class="">Selecione avaliadores</option>
                <option value="eliene" class="">Eliene</option>
                <option value="daniele" class="">Daniele</option>
                <option value="ada" class="">Ada</option>
                <option value="marcos_vinicius" class="">Marcos Vinicius</option>
                <option value="gabriel" class="">Gabriel</option>
            </select>
        </div>

        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center">Enviar</button>
    </form>


</div>
@endsection