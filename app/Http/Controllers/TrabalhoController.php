<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabalho;
use app\Models\User;
use Illuminate\Support\Str;

class TrabalhoController extends Controller
{
    // Exibe a lista de trabalhos
    public function index()
    {
        $trabalhos = Trabalho::all();
        return view('admin.listar-trabalhos', compact('trabalhos'));
    }

    // Exibe o formulário de criação de um novo trabalho
    public function create()
    {
        $avaliadores = User::where('role', 'avaliador')->get();
        return view('admin.criar-trabalho', compact('avaliadores'));
    }

    // Salva um novo trabalho
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'resumo' => 'required|string',
            'protocolo' => 'required|string|unique:trabalhos',
            'curso' => 'required|string',
            'modelo_avaliativo' => 'nullable|string',
            'avaliadores' => 'array' // validação para os IDs dos avaliadores
        ]);

        $trabalho = new Trabalho();
        $trabalho->titulo = $request->titulo;
        $trabalho->resumo = $request->resumo;
        $trabalho->protocolo = $request->protocolo;
        $trabalho->curso = $request->curso;
        $trabalho->modelo_avaliativo = $request->modelo_avaliativo;
        $trabalho->save();

        if ($request->has('avaliadores')) {
            $trabalho->avaliadores()->sync($request->avaliadores); // Atribui avaliadores ao trabalho
        }

        return redirect()->route('trabalho.index')->with('success', 'Trabalho criado e avaliadores atribuídos com sucesso!');
    }

    // Exibe o formulário para editar um trabalho
    public function edit($id)
    {
        $trabalho = Trabalho::findOrFail($id);
        $avaliadores = User::where('role', 'avaliador')->get();
        $avaliadoresSelecionados = $trabalho->avaliadores->pluck('id')->toArray(); // IDs dos avaliadores já atribuídos
        return view('trabalhos.edit', compact('trabalho', 'avaliadores', 'avaliadoresSelecionados'));
    }

    // Atualiza os dados do trabalho
    public function update(Request $request, $id)
    {
        $trabalho = Trabalho::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'resumo' => 'required|string',
            'modelo_avaliativo' => 'nullable|string',
            'avaliadores' => 'array'
        ]);

        $trabalho->titulo = $request->titulo;
        $trabalho->resumo = $request->resumo;
        $trabalho->modelo_avaliativo = $request->modelo_avaliativo;
        $trabalho->save();

        if ($request->has('avaliadores')) {
            $trabalho->avaliadores()->sync($request->avaliadores); // Atualiza os avaliadores atribuídos
        }

        return redirect()->route('trabalho.index')->with('success', 'Trabalho atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $trabalho = Trabalho::findOrFail($id);
        $trabalho->delete();

        return redirect()->route('trabalho.index')->with('success', 'Trabalho excluído com sucesso!');
    }

}

