 @extends('layouts.app')
 @section('content')
 <div class="container m-auto max-w-2xl py-4 sm:py-12 px-2 sm:px-4">
     <!-- Título e Linha de Separação -->
     <div class="flex justify-between items-center mb-8">
         <div class="flex flex-col justify-between items-center">
             <h1 class="text-4xl font-bold text-[#2e4a67] mb-1">SIMPAC</h1>
             <div class="border-t-2 border-black w-24 mx-auto"></div>
             <p class="text-lg text-[#2e4a67]">Listar Trabalhos</p>
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
     <form method="GET" class="mb-4 flex justify-end gap-4 sm:gap-2">
         <div class="flex gap-2 items-center justify-start">
             <!-- Botão para abrir o modal de filtros -->
             <a href="{{ route('trabalhos.all') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 sm:px-3 sm:py-1 ml-2">
                 Limpar Filtros
             </a>
             <button type="button" onclick="abrirModalFiltros()"
                 class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                 </svg>
             </button>
         </div>
     </form>


     <!-- Modal de Filtros -->
     <div id="modal-filtros" class="fixed inset-0 bg-black bg-opacity-30 hidden flex items-center justify-center z-50">
         <div class="bg-white rounded-lg shadow-lg p-4 w-full max-w-md">
             <!-- Cabeçalho do modal -->
             <div class="flex justify-between items-center pb-4 border-b">
                 <h3 class="text-lg font-semibold text-gray-700">Filtros</h3>
                 <button type="button" onclick="fecharModalFiltros()"
                     class="text-gray-500 hover:bg-gray-200 rounded-lg p-1.5">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                         <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                     </svg>
                 </button>
             </div>

             <!-- Formulário de Filtros -->
             <form method="GET" class="mt-4 space-y-4">
                 <div>
                     <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                     <input type="text" name="titulo" value="{{ request('titulo') }}" id="titulo"
                         class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                 </div>
                 <div>
                     <label for="curso" class="block text-sm font-medium text-gray-700">Curso</label>
                     <select name="curso" id="curso" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                         <option value="">Selecione um curso</option>
                         <option value="adm" {{ request('curso') === 'adm' ? 'selected' : '' }}>Administração</option>
                         <option value="ads" {{ request('curso') === 'ads' ? 'selected' : '' }}>Análise e Desenvolvimento de Sistemas</option>
                         <option value="arq" {{ request('curso') === 'arq' ? 'selected' : '' }}>Arquitetura e Urbanismo</option>
                         <option value="cco" {{ request('curso') === 'cco' ? 'selected' : '' }}>Ciências Contábeis</option>
                         <option value="civ" {{ request('curso') === 'civ' ? 'selected' : '' }}>Engenharia Civil</option>
                         <option value="dir" {{ request('curso') === 'dir' ? 'selected' : '' }}>Direito</option>
                         <option value="eab" {{ request('curso') === 'eab' ? 'selected' : '' }}>Engenharia Ambiental</option>
                         <option value="eco" {{ request('curso') === 'eco' ? 'selected' : '' }}>Engenharia de Computação</option>
                         <option value="enf" {{ request('curso') === 'enf' ? 'selected' : '' }}>Enfermagem</option>
                         <option value="enq" {{ request('curso') === 'enq' ? 'selected' : '' }}>Engenharia Química</option>
                         <option value="far" {{ request('curso') === 'far' ? 'selected' : '' }}>Farmácia</option>
                         <option value="fisio" {{ request('curso') === 'fisio' ? 'selected' : '' }}>Fisioterapia</option>
                         <option value="nut" {{ request('curso') === 'nut' ? 'selected' : '' }}>Nutrição</option>
                         <option value="odo" {{ request('curso') === 'odo' ? 'selected' : '' }}>Odontologia</option>
                         <option value="psi" {{ request('curso') === 'psi' ? 'selected' : '' }}>Psicologia</option>
                         <option value="vet" {{ request('curso') === 'vet' ? 'selected' : '' }}>Medicina Veterinária</option>
                     </select>
                 </div>
                 <div>
                     <label for="simposio" class="block text-sm font-medium text-gray-700">Simpósio</label>
                     <input type="text" name="simposio" value="{{ request('simposio') }}" id="simposio"
                         class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                 </div>
                 <div>
                     <label for="ordem" class="block text-sm font-medium text-gray-700">Ordem</label>
                     <select name="ordem" id="ordem" class="bg-white border w-full rounded-lg focus:ring focus:ring-blue-300 px-3 py-2" onchange="this.form.submit()">
                         <option value="asc" {{ request('ordem') == 'asc' ? 'selected' : '' }}>Crescente</option>
                         <option value="desc" {{ request('ordem') == 'desc' ? 'selected' : '' }}>Decrescente</option>
                     </select>
                 </div>
                 <div class="flex justify-between">
                     <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                         Aplicar Filtros
                     </button>
                     <a href="{{ route('trabalhos.all') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                         Limpar Filtros
                     </a>

                 </div>
             </form>
         </div>
     </div>
     <!-- Grade de Quadrados -->
     @if($trabalhos->isEmpty())
     <p class="text-gray-600">Nenhum trabalho encontrado.</p>
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

     <div class="mt-4">
         {{ $trabalhos->links('pagination::tailwind') }}
     </div>
     @endif
 </div>
 <script>
     function abrirModalFiltros() {
         document.getElementById('modal-filtros').classList.remove('hidden');
     }

     function fecharModalFiltros() {
         document.getElementById('modal-filtros').classList.add('hidden');
     }

     function toggleOrdem() {
         const urlParams = new URLSearchParams(window.location.search);
         const currentOrdem = urlParams.get('ordem');
         const novaOrdem = currentOrdem === 'asc' ? 'desc' : 'asc';
         urlParams.set('ordem', novaOrdem);

         // Redireciona para a URL atual com o parâmetro atualizado
         window.location.search = urlParams.toString();
     }
 </script>
 @endsection