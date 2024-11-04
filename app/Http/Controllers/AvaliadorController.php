<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Trabalho;
use Illuminate\Support\Facades\Auth;

class AvaliadorController extends Controller
{
    public function listarTrabalhosAtribuidos()
    {
        $avaliadorId = Auth::id();
        $trabalhos = Trabalho::whereHas('avaliadores', function ($query) use ($avaliadorId) {
            $query->where('avaliador_id', $avaliadorId);
        })->get();

        return view('avaliador.trabalhos', compact('trabalhos'));
    }

    // Exibe detalhes de um trabalho para avaliação
    public function mostrarTrabalho($id)
    {
        $trabalho = Trabalho::findOrFail($id);
        return view('avaliador.avaliar', compact('trabalho'));
    }

    // Submete avaliação para um trabalho
    public function submeterAvaliacao(Request $request, $id)
    {
        $trabalho = Trabalho::findOrFail($id);
        // Exemplo de lógica para salvar a avaliação do avaliador
        // A lógica dependerá dos campos exatos na tabela de avaliação
        $request->validate([
            'comentarios' => 'required|string'
        ]);

        // Salvar a avaliação
        return redirect()->route('avaliador.trabalhos')->with('success', 'Avaliação submetida com sucesso!');
    }

}

