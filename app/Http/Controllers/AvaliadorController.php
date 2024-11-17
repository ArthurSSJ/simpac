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
        // Obtenha os trabalhos do avaliador
        $trabalhos = Trabalho::whereHas('avaliadores', function ($query) use ($avaliadorId) {
            $query->where('avaliador_id', $avaliadorId);
        })->get();

        // Retorna apenas os dados
        return $trabalhos;
    }

    public function mostrarTrabalho($id)
    {
        $trabalho = Trabalho::findOrFail($id);
        return view('avaliador.avaliar', compact('trabalho'));
    }

    public function submeterAvaliacao(Request $request, $id)
    {
        $trabalho = Trabalho::findOrFail($id);
        $request->validate([
            'comentarios' => 'required|string'
        ]);

        return redirect()->route('avaliador.listar-trabalhos')->with('success', 'Avaliação submetida com sucesso!');
    }
}

