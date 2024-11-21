<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabalho;
use app\Models\User;
use Illuminate\Support\Str;
use App\Models\Simposio;

class TrabalhoController extends Controller
{
    public function all(Request $request)
    {
        $query = Trabalho::query();

        // Filtro por título
        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        // Filtro por curso
        if ($request->filled('curso')) {
            $query->where('curso', 'like', '%' . $request->curso . '%');
        }

        // Filtro por simpósio
        if ($request->filled('simposio')) {
            $query->whereHas('simposio', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->simposio . '%');
            });
        }

        // Ordenação
        if (in_array($request->get('ordem'), ['asc', 'desc'])) {
            $query->orderBy('media_final', $request->ordem);
        }

        // Paginação
        $trabalhos = $query->paginate(5)->withQueryString();

        return view('admin.trabalhos-all', compact('trabalhos'));
    }

    public function resultados(Request $request)
    {
        $query = Trabalho::query();

        // Filtro por título
        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        // Filtro por curso
        if ($request->filled('curso')) {
            $query->where('curso', $request->curso); // Filtro direto para exata correspondência
        }

        // Filtro por simpósio
        if ($request->filled('simposio')) {
            $query->whereHas('simposio', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->simposio . '%');
            });
        }

        // Ordenação
        if (in_array($request->get('ordem'), ['asc', 'desc'])) {
            $query->orderBy('media_final', $request->ordem);
        }

        // Paginação
        $trabalhos = $query->paginate(5)->withQueryString();

        return view('resultados', compact('trabalhos'));
    }


    // Exibe a lista de trabalhos
    public function index()
    {
        $trabalhos = Trabalho::all();
        return view('admin.listar-trabalhos', compact('trabalhos'));
    }

    // Exibe o formulário de criação de um novo trabalho
    public function create($simposioId)
    {
        $simposio = Simposio::findOrFail($simposioId);

        if (!$simposio) {
            return redirect()->back()->withErrors(['error' => 'Nenhum não econtrado. Crie um simpósio antes de adicionar trabalhos.']);
        }

        $avaliadores = User::where('role', 'avaliador')->get();
        return view('admin.criar-trabalho', compact('simposio', 'avaliadores'));
    }

    // Salva um novo trabalho
    public function store(Request $request, $simposioId)
    {

        $simposio = Simposio::findOrFail($simposioId);
        try {
            $request->validate([
                'titulo' => 'required|string|max:255',
                'resumo' => 'required|string',
                'protocolo' => 'required|string|unique:trabalhos',
                'curso' => 'required|string',
                'modelo_avaliativo' => 'nullable|string',
                'avaliadores' => 'array',
            ]);

            // Resto do código...
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }

        try {
            $trabalho = new Trabalho();
            $trabalho->titulo = $request->titulo;
            $trabalho->resumo = $request->resumo;
            $trabalho->protocolo = $request->protocolo;
            $trabalho->curso = $request->curso;
            $trabalho->modelo_avaliativo = $request->modelo_avaliativo;
            $trabalho->media_final = $request->has('media_final') ? number_format($request->media_final, 2, '.', '') : null;
            $trabalho->simposio_id = $simposio->id;
            $trabalho->save();

            if ($request->has('avaliadores')) {
                $trabalho->avaliadores()->sync($request->avaliadores);
            }

            return redirect()->route('simposios.edit', $simposioId)->with('success', 'Trabalho criado e avaliadores atribuídos com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Exibe o formulário para editar um trabalho
    public function edit($id)
    {
        $trabalho = Trabalho::findOrFail($id);
        $avaliadores = User::where('role', 'avaliador')->get();
        $avaliadoresSelecionados = $trabalho->avaliadores->pluck('id')->toArray();

        // Ajuste para o caminho da view correta:
        return view('admin.alterar-trabalho', compact('trabalho', 'avaliadores', 'avaliadoresSelecionados'));
    }

    // Atualiza os dados do trabalho
    public function update(Request $request, $id)
    {
        $trabalho = Trabalho::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'resumo' => 'required|string',
            'protocolo' => 'required|string',
            'curso' => 'required|string',
            'modelo_avaliativo' => 'nullable|string',
            'avaliadores' => 'array'
        ]);

        try {
        $trabalho->titulo = $request->titulo;
        $trabalho->resumo = $request->resumo;
        $trabalho->protocolo = $request->protocolo;
        $trabalho->curso = $request->curso;
        $trabalho->modelo_avaliativo = $request->modelo_avaliativo;
        // Mantém a média existente
        $trabalho->save();

        if ($request->has('avaliadores')) {
            $trabalho->avaliadores()->sync($request->avaliadores);
        }
        $simposioId = $trabalho->simposio_id;

            return redirect()->route('simposios.edit', $simposioId)->with('success', 'Trabalho atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        $trabalho = Trabalho::findOrFail($id);
        $trabalho->delete();

        return redirect()->route('trabalho.index')->with('success', 'Trabalho excluído com sucesso!');
    }

}

