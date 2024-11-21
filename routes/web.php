<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrabalhoController;
use App\Http\Controllers\AvaliadorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SimposioController;
use App\Models\Trabalho;
use App\Models\Simposio;
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

// Rota para editar o avaliador
Route::get('/avaliadores/{avaliador}/editar', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $adminController = new AdminController();
        return $adminController->editAvaliador($id);
    }
    return abort(403); // Retorna erro 403 se o usuário não for admin
})->name('avaliadores.edit');

// Rota para atualizar o avaliador
Route::put('/avaliadores/{avaliador}/editar', function (Request $request, $id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $adminController = new AdminController();
        return $adminController->updateAvaliador($request, $id);
    }
    return abort(403); // Retorna erro 403 se o usuário não for admin
})->name('avaliadores.update');

// Rota para excluir o avaliador
Route::delete('/avaliadores/{avaliador}', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $adminController = new AdminController();
        return $adminController->destroyAvaliador($id);
    }
    return abort(403); // Retorna erro 403 se o usuário não for admin
})->name('avaliadores.destroy');






Route::get('/login/admin', [AuthController::class, 'showAdminLogin'])->name('login.admin');
Route::get('/login/avaliador', [AuthController::class, 'showAvaliadorLogin'])->name('login.avaliador');










Route::get('/trabalhos', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $trabalhos = Trabalho::all();
        return view('admin.listar-trabalhos', compact('trabalhos'));
    } else if (Auth::check() && Auth::user()->role === 'avaliador') {
        $avaliadorController = new AvaliadorController();
        $trabalhos = $avaliadorController->listarTrabalhosAtribuidos();
        return view('avaliador.listar-trabalhos', compact('trabalhos'));
    }
    return abort(403);
})->name('trabalho.index');

Route::get('/trabalhos/{trabalho}/avaliar', function ($id) {
    if (Auth::check() && Auth::user()->role === 'avaliador') {
        $avaliadorController = new AvaliadorController();
        $trabalho = $avaliadorController->mostrarTrabalho($id);
        return view('avaliador.avaliar', compact('trabalho'));
    }
    return abort(403);
})->name('trabalho.avaliar');


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

// Rota para exibir o formulário de edição de um trabalho existente
Route::get('/trabalhos/{trabalho}/editar', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $trabalhoController = new TrabalhoController();
        return $trabalhoController->edit($id); // Chama o método edit, que já retorna a view correta
    }
    return abort(403); // Retorna erro 403 se o usuário não for admin
})->name('trabalhos.edit');

// Rota para atualizar o trabalho existente
Route::post('/trabalhos/{trabalho}/editar', function (Request $request, $id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $trabalhoController = new TrabalhoController();
        return $trabalhoController->update($request, $id);
    }
    return abort(403); // Retorna erro 403 se o usuário não for admin
})->name('trabalhos.update');

// Rota para excluir um trabalho
Route::delete('/trabalhos/{trabalho}/excluir', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $trabalhoController = new TrabalhoController();
        return $trabalhoController->destroy($id);
    }
    return abort(403);
})->name('trabalhos.destroy');

// // Rota para atribuir avaliadores a um trabalho
// Route::get('/trabalhos/{trabalho}/atribuir-avaliadores', function ($id) {
//     if (Auth::check() && Auth::user()->role === 'admin') {
//         $trabalhoController = new TrabalhoController();
//         return $trabalhoController->assignAvaliadores(new Request(), $id);
//     }
//     return abort(403);
// })->name('trabalhos.assign');

// Route::post('/trabalhos/{trabalho}/atribuir-avaliadores', function (Request $request, $id) {
//     if (Auth::check() && Auth::user()->role === 'admin') {
//         $trabalhoController = new TrabalhoController();
//         return $trabalhoController->assignAvaliadores($request, $id);
//     }
//     return abort(403);
// });






// Rota para acessar um trabalho específico para avaliação
Route::get('/avaliador/trabalhos/{trabalho}/avaliar', function ($id) {
    if (Auth::check() && Auth::user()->role === 'avaliador') {
        $avaliadorController = new AvaliadorController();
        $trabalho = $avaliadorController->mostrarTrabalho($id); // Obtém o objeto Trabalho
        return view('avaliador.avaliar', compact('trabalho')); // Renderiza a view com o objeto
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
})->name('avaliador.trabalho.avaliar');




// Rota para lista de simposios
Route::get('/simposios', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $simposios = Simposio::all();
        return view('admin.listar-simposios', compact('simposios'));
    }
    return abort(403);
})->name('simposios.index');

// Rota para criar um novo simposio
Route::get('/simposios/criar', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return view('admin.criar-simposio');
    }
    return abort(403);
})->name('simposios.create');

Route::post('/simposios/criar', function (Request $request) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $simposioController = new SimposioController();
        return $simposioController->store($request);
    }
    return abort(403);
})->name('simposios.store');

// Rota para exibir o formulário de edição de um simposio existente
Route::get('/simposios/{simposio}/editar', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $simposioController = new SimposioController();
        return $simposioController->edit($id); // Chama o método edit, que já retorna a view correta
    }
    return abort(403); // Retorna erro 403 se o usuário não for admin
})->name('simposios.edit');

// Rota para atualizar o simposio existente
Route::post('/simposios/{simposio}/editar', function (Request $request, $id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $simposioController = new SimposioController();
        return $simposioController->update($request, $id);
    }
    return abort(403); // Retorna erro 403 se o usuário não for admin
})->name('simposios.update');

// Rota para finalizar um simposio
Route::get('/simposios/{simposio}/finalizar', function ($id) {
    if (Auth::check() && Auth::user()->role === 'admin') {
        $simposioController = new SimposioController();
        return $simposioController->finalizar($id);
    }
    return abort(403); // Retorna erro 403 se o usuário não for admin
})->name('simposios.finalizar');


require __DIR__ . '/auth.php';
