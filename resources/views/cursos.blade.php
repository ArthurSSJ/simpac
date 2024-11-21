@extends('layouts.app')
@section('content')
<div class="container m-auto py-4 flex flex-col justify-center items-center gap-6">

    <div class="text-center font-semibold text-blue-950">
        <h2 class="text-lg">Cursos</h2>
    </div>

    <div class="grid grid-cols-2 gap-4 w-full sm:max-w-lg px-4">
        <a href="{{ route('resultados', ['curso' => 'adm']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">
            ADM
        </a>

        <a href="{{ route('resultados', ['curso' => 'ads']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">ADS</a>

        <a href="{{ route('resultados', ['curso' => 'arq']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">ARQ</a>

        <a href="{{ route('resultados', ['curso' => 'cco']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">CCO</a>

        <a href="{{ route('resultados', ['curso' => 'civ']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">CIV</a>

        <a href="{{ route('resultados', ['curso' => 'dir']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">DIR</a>

        <a href="{{ route('resultados', ['curso' => 'eab']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">EAB</a>

        <a href="{{ route('resultados', ['curso' => 'eco']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">ECO</a>

        <a href="{{ route('resultados', ['curso' => 'enf']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">ENF</a>

        <a href="{{ route('resultados', ['curso' => 'enq']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">ENQ</a>

        <a href="{{ route('resultados', ['curso' => 'far']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">FAR</a>

        <a href="{{ route('resultados', ['curso' => 'fisio']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">FISIO</a>

        <a href="{{ route('resultados', ['curso' => 'nut']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">NUT</a>

        <a href="{{ route('resultados', ['curso' => 'odo']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">ODO</a>

        <a href="{{ route('resultados', ['curso' => 'psi']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">PSI</a>

        <a href="{{ route('resultados', ['curso' => 'vet']) }}" class="bg-blue-900 w-full px-2 py-2 rounded-2xl text-lg text-white font-semibold hover:bg-blue-800 text-center">VET</a>

    </div>
</div>
@endsection