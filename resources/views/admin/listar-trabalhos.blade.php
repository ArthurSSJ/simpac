 @extends('layouts.app')
 @section('content')
 <div class="container m-auto max-w-2xl py-4 sm:py-12 px-2 sm:px-4">
     <!-- Título e Linha de Separação -->
     <div class="flex justify-between items-center mb-8">
         <div class="flex flex-col justify-between items-center">
             <h1 class="text-4xl font-bold text-[#2e4a67] mb-1">SIMPAC</h1>
             <div class="border-t-2 border-black w-24 mx-auto"></div>
             <p class="text-lg text-[#2e4a67">Listar Trabalhos</p>
         </div>
         <div class="">
             <a href="{{ route('trabalho.create') }}" class="bg-[#2e4a67] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#2e4a67]/90">Criar Trabalho</a>
         </div>
     </div>

     <!-- Grade de Quadrados -->
     <div class="grid grid-cols-2 gap-6">
         @foreach ($trabalhos as $trabalho)
         <div class="bg-gray-300 p-4 rounded-lg text-center text-gray-800 text-sm font-semibold flex items-center justify-center h-32">
             {{ $trabalho->resumo }}
         </div>
         @endforeach
     </div>
 </div>
 @endsection