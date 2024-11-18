<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Trabalho;
use Illuminate\Support\Facades\Auth;
use App\Models\Avaliacoes;

class AvaliadorController extends Controller
{
    public function listarTrabalhosAtribuidos()
    {
        $avaliadorId = Auth::id();

        // Obtenha os trabalhos atribuídos ao avaliador
        $trabalhos = Trabalho::whereHas('avaliadores', function ($query) use ($avaliadorId) {
            $query->where('avaliador_id', $avaliadorId);
        })->get();  // Isso deve retornar uma coleção de objetos

        // Adiciona um campo 'avaliado' para cada trabalho
        foreach ($trabalhos as $trabalho) {
            $trabalho->avaliado = Avaliacoes::where('trabalho_id', $trabalho->id)
                ->where('avaliador_id', $avaliadorId)
                ->exists();
        }

        // Retorne os trabalhos para a view
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

        // Valida o campo de nota
        $request->validate([
            'nota' => 'required|numeric|min:0|max:10' // Valida a nota total
        ]);

        // Obtém o ID do avaliador autenticado
        $avaliadorId = Auth::id();

        // Verifica se o avaliador já avaliou este trabalho
        $jaAvaliou = Avaliacoes::where('trabalho_id', $trabalho->id)
            ->where('avaliador_id', $avaliadorId)
            ->exists();

        if ($jaAvaliou) {
            return redirect()->back()->withErrors('Você já avaliou este trabalho.');
        }

        // Salva a nova avaliação no banco de dados
        $avaliacao = new Avaliacoes();
        $avaliacao->trabalho_id = $trabalho->id;
        $avaliacao->avaliador_id = $avaliadorId;
        $avaliacao->nota = $request->nota;
        $avaliacao->save();

        // Calcula a nova média final do trabalho
        $mediaFinal = Avaliacoes::where('trabalho_id', $id)->avg('nota');

        // Atualiza o campo media_final no trabalho
        $trabalho->media_final = $mediaFinal;
        $trabalho->save();

        // Redireciona com mensagem de sucesso
        return redirect()->route('trabalho.index')->with('success', 'Avaliação submetida com sucesso!');
    }
}

