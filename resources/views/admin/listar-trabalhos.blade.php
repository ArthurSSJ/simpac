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
     @if (session('success'))
     <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
         {{ session('success') }}
     </div>
     @elseif (session('error'))
     <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
         {{ session('error') }}
     </div>
     @elseif (session('warning'))
     <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
         {{ session('warning') }}
     </div>
     @endif

     <!-- Grade de Quadrados -->
     @if($trabalhos->isEmpty())
     <p class="text-gray-600">Nenhum trabalho cadastrador.</p>
     @else
     <table class="table-auto w-full border">
         <thead>
             <tr>
                 <th class="px-4 py-2">Título</th>
                 <th class="py-2">Média final</th>
                 <th class="py-2">Ação</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($trabalhos as $trabalho)
             <tr>
                 <td class="border-y px-4 py-4"><span class="line-clamp-1 text-wrap">{{ $trabalho->titulo }}</span></td>
                 <td class="border-y py-2 text-center w-24">{{ $trabalho->media_final }}</td>
                 <td class="border-y text-center w-20">
                     <a href="{{ route('trabalhos.edit', $trabalho->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">
                         Editar
                     </a>
                 </td>
             </tr>
             @endforeach
         </tbody>
     </table>
     @endif
 </div>
 @endsection