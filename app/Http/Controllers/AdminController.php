<?php

namespace App\Http\Controllers;

use App\Models\User; // Assegure-se de que o modelo User esteja importado
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Método para exibir a lista de avaliadores
    public function index()
    {
        $avaliadores = User::where('role', 'avaliador')->get();
        return view('admin.listar-avaliadores', compact('avaliadores')); // Corrigido para listar avaliadores
    }

    // Método para armazenar um novo avaliador
    public function storeAvaliador(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // Corrigido para password
        ]);

        // Criação do novo avaliador
        User::create([
            'name' => $request->name, // Corrigido para name
            'email' => $request->email,
            'password' => bcrypt($request->password), // Corrigido para password
            'role' => 'avaliador', // Define o papel como avaliador
        ]);

        return redirect()->route('avaliadores.index')->with('success', 'Avaliador criado com sucesso!'); // Redireciona corretamente
    }

    // Método para editar um avaliador
    public function editAvaliador($id)
    {
        $avaliador = User::findOrFail($id);
        return view('admin.editar-avaliador', compact('avaliador'));
    }

    // Método para atualizar um avaliador
    public function updateAvaliador(Request $request,
        $id
    ) {
        $avaliador = User::findOrFail($id);

        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $avaliador->id,
        ]);

        // Atualização dos dados do avaliador
        $avaliador->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('avaliadores.index')->with('success', 'Avaliador atualizado com sucesso!');
    }

    
    // Método para excluir um avaliador
    public function destroyAvaliador($id)
    {
        $avaliador = User::findOrFail($id);
        $avaliador->delete();

        return redirect()->route('avaliadores.index')->with('success', 'Avaliador excluído com sucesso!');
    }
}
