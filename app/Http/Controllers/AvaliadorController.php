<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Trabalho;
use Illuminate\Support\Facades\Auth;
use App\Models\Avaliacao;

class AvaliadorController extends Controller
{
    public function listarTrabalhosAtribuidos()
    {
        $avaliadorId = Auth::id();
        // Obtenha os trabalhos do avaliador
        $trabalhos = Trabalho::whereHas('avaliadores', function ($query) use ($avaliadorId) {
            $query->where('avaliador_id', $avaliadorId);
        })->get();

        // Retorna apenas os dados
        return $trabalhos;
    }

    public function mostrarTrabalho($id)
    {
        return Trabalho::findOrFail($id);
    }

    public function submeterAvaliacao(Request $request, $id)
    {
        // Verifica se o trabalho existe
        $trabalho = Trabalho::findOrFail($id);

        // Valida os dados enviados
        $request->validate([
            'comentarios' => 'required|string',
            'notas' => 'required|array',
            'notas.*' => 'numeric|min:0|max:10' // Valida as notas individualmente
        ]);

        // Salvar a avaliação na tabela avaliacoes
        $avaliacao = new Avaliacao();
        $avaliacao->trabalho_id = $trabalho->id;
        $avaliacao->avaliador_id = Auth::id(); // ID do avaliador autenticado
        $avaliacao->comentarios = $request->comentarios;
        $avaliacao->notas = json_encode($request->notas); // Salva as notas como JSON
        $avaliacao->media = array_sum($request->notas) / count($request->notas); // Calcula a média
        $avaliacao->save();

        // Redirecionar com mensagem de sucesso
        return redirect()->route('avaliador.listar-trabalhos')->with('success', 'Avaliação submetida com sucesso!');
    }
}

