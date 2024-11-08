<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrabalhoController;
use App\Http\Controllers\AvaliadorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Models\Trabalho;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/resultados', function () {
    return view('resultados');
})->name('resultados');

Route::get('/inicio', function () {
    if (Auth::user()->role === 'admin') {
        return view('admin.dashboard'); // Carrega o dashboard para Admin
    } elseif (Auth::user()->role === 'avaliador') {
        return view('avaliador.dashboard'); // Carrega o dashboard para Avaliador
    }
    return abort(403); // Retorna erro 403 se o usuário não tiver a role correta
})->middleware(['auth', 'verified'])->name('inicio');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/alterar-trabalhos', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return view('admin.alterar-trabalhos'); // Carrega a view para cadastrar avaliador
    }
    return abort(403); // Retorna erro 403 se o usuário não for admin
})->middleware(['auth'])->name('trabalhos.alterar');












// Rota para listar avaliadores
Route::get('/avaliadores', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $adminController = new AdminController();
        $adminController = $adminController->index();
        $avaliadores = User::where('role', 'avaliador')->get();
        return view('admin.listar-avaliadores', compact('avaliadores')); // Carrega a view com a lista de avaliadores
    }
    return abort(403); // Retorna erro 403 se o usuário não for admin
})->middleware(['auth'])->name('avaliadores.index');


// Rota para exibir o formulário de cadastro de avaliador
Route::get('/avaliadores/criar', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return view('admin.cadastrar-avaliador'); // Carrega a view para cadastrar avaliador
    }
    return abort(403); // Retorna erro 403 se o usuário não for admin
})->name('avaliadores.create');


// Rota para processar o cadastro do avaliador
Route::post('/avaliadores/criar', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $adminController = new AdminController();
        return $adminController->storeAvaliador(request()); // Chama o método storeAvaliador do AdminController
    }
    return abort(403); // Retorna erro 403 se o usuário não for admin
})->name('avaliadores.store');





Route::get('/login/admin', [AuthController::class, 'showAdminLogin'])->name('login.admin');
Route::get('/login/avaliador', [AuthController::class, 'showAvaliadorLogin'])->name('login.avaliador');










// Rota para listar todos os trabalhos
Route::get('/trabalhos', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $trabalhoController = new TrabalhoController();
        $trabalhos = Trabalho::all();
        return view('admin.listar-trabalhos', compact('trabalhos'));
    }else if (Auth::check() && Auth::user()->role === 'avaliador') {
        $avaliadorController = new AvaliadorController();
        $trabalhos = $avaliadorController->listarTrabalhosAtribuidos();
        return view('avaliador.trabalhos', compact('trabalhos'));
    }
    return abort(403); // Acesso negado se o usuário não for admin
})->name('trabalho.index');



// Rota para criar um novo trabalho
Route::get('/trabalhos/criar', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $trabalhoController = new TrabalhoController();
        $avaliadores = User::where('role', 'avaliador')->get();

        return view('admin.criar-trabalho', compact('avaliadores'));
    }
    return abort(403);
})->name('trabalho.create');

Route::post('/trabalhos/criar', function (Request $request) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $trabalhoController = new TrabalhoController();
        return $trabalhoController->store($request);
    }
    return abort(403);
})->name('trabalhos.store');

// Rota para editar um trabalho existente
Route::get('/trabalhos/{trabalho}/editar', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $trabalhoController = new TrabalhoController();
        $trabalho = $trabalhoController->edit($id);
        return view('trabalhos.edit', compact('trabalho'));
    }
    return abort(403);
})->name('trabalhos.edit');

Route::post('/trabalhos/{trabalho}/editar', function (Request $request, $id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $trabalhoController = new TrabalhoController();
        return $trabalhoController->update($request, $id);
    }
    return abort(403);
})->name('trabalhos.update');

// Rota para excluir um trabalho
Route::delete('/trabalhos/{trabalho}/excluir', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $trabalhoController = new TrabalhoController();
        return $trabalhoController->destroy($id);
    }
    return abort(403);
})->name('trabalhos.destroy');

// Rota para atribuir avaliadores a um trabalho
Route::get('/trabalhos/{trabalho}/atribuir-avaliadores', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $trabalhoController = new TrabalhoController();
        return $trabalhoController->assignAvaliadores(new Request(), $id);
    }
    return abort(403);
})->name('trabalhos.assign');

Route::post('/trabalhos/{trabalho}/atribuir-avaliadores', function (Request $request, $id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $trabalhoController = new TrabalhoController();
        return $trabalhoController->assignAvaliadores($request, $id);
    }
    return abort(403);
});







// Rota para listar trabalhos atribuídos ao avaliador
Route::get('/avaliador/trabalhos', function () {
    if (Auth::check() && Auth::user()->role === 'avaliador') {
        $avaliadorController = new AvaliadorController();
        $trabalhos = $avaliadorController->listarTrabalhosAtribuidos();
        return view('avaliador.trabalhos', compact('trabalhos'));
    }
    return abort(403);
})->name('avaliador.trabalhos');

// Rota para acessar um trabalho específico para avaliação
Route::get('/avaliador/trabalhos/{trabalho}/avaliar', function ($id) {
    if (Auth::check() && Auth::user()->role === 'avaliador') {
        $avaliadorController = new AvaliadorController();
        $trabalho = $avaliadorController->mostrarTrabalho($id);
        return view('avaliador.avaliar', compact('trabalho'));
    }
    return abort(403);
})->name('avaliador.trabalho.avaliar');

// Rota para submeter a avaliação de um trabalho
Route::post('/avaliador/trabalhos/{trabalho}/avaliar', function (Request $request, $id) {
    if (Auth::check() && Auth::user()->role === 'avaliador') {
        $avaliadorController = new AvaliadorController();
        return $avaliadorController->submeterAvaliacao($request, $id);
    }
    return abort(403);
});





require __DIR__ . '/auth.php';
