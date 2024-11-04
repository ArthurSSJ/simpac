@extends('layouts.app') <!-- Certifique-se de que o caminho está correto -->

@section('content')
    <div class="container m-auto py-4 flex flex-col justify-center items-center gap-6">

        <img src="" alt="" class="w-1/2 max-w-48">


        <div class="text-center font-semibold text-blue-950">
            <h2 class="text-xl">Simpac</h2>
            <h3 class="text-3xl">Boas-Vindas</h3>
        </div>

        <a href="" class=" bg-blue-900 px-2 py-2 rounded-lg text-lg text-white hover:bg-blue-800">
            Administrador
        </a>

        <a href="" class=" bg-blue-900 px-2 py-2 rounded-lg text-lg text-white hover:bg-blue-800">
            Avaliador
        </a>
        <a href="" class=" bg-blue-900 px-2 py-2 rounded-lg text-lg text-white hover:bg-blue-800">
            Resumo dos aprovados
        </a>
    </div>
@endsection