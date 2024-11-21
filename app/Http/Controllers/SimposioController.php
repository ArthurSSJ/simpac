<?php

namespace App\Http\Controllers;


use App\Models\Simposio;
use Illuminate\Http\Request;
use app\Models\User;

class SimposioController extends Controller
{
    public function index()
    {
        $simposios = Simposio::all();
        return $simposios;
    }

    public function create()
    {
        return view('admin.simposios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação da imagem
            'inicio' => 'required|date',
        ]);

        $data = $request->all();

        // Verifica se uma imagem foi enviada
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $path = $request->file('imagem')->store('simposios', 'public'); // Salva a imagem na pasta `storage/app/public/simposios`
            $data['imagem'] = $path; // Armazena o caminho no banco de dados
        }

        Simposio::create($data);

        return redirect()->route('simposios.index')->with('success', 'Simpósio criado com sucesso!');
    }
    public function edit($id)
    {
        $simposio = Simposio::findOrFail($id); // Obtém o simpósio pelo ID
        $avaliadores = User::where('role', 'avaliador')->get();
        $trabalhos = $simposio->trabalhos->load('avaliadores'); // Carrega os trabalhos e seus avaliadores

        return view('admin.editar-simposio', compact('simposio', 'avaliadores', 'trabalhos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'inicio' => 'required|date',
        ]);

        $simposio = Simposio::findOrFail($id); // Obtém o simpósio pelo ID
        $data = $request->all();

        // Se houver uma nova imagem, substitui a existente
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $path = $request->file('imagem')->store('simposios', 'public');
            $data['imagem'] = $path;
        }

        $simposio->update($data);

        return redirect()->route('simposios.edit', $id)->with('success', 'Simpósio atualizado com sucesso!');
    }


    public function finalizar($id)
    {
        $simposio = Simposio::findOrFail($id);
        $simposio->update([
            'finalizado' => true,
            'fim' => now(),
        ]);

        return redirect()->route('simposios.index')->with('success', 'Simpósio finalizado com sucesso!');
    }
}
