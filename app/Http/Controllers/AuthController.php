<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    // Método para logout e redirecionamento para o login de administrador
    public function showAdminLogin()
    {
        Auth::logout();
        return redirect()->route('login')->with('login_type', 'admin');
    }

    // Método para logout e redirecionamento para o login de avaliador
    public function showAvaliadorLogin()
    {
        Auth::logout();
        return redirect()->route('login')->with('login_type', 'avaliador');
    }
    
}
