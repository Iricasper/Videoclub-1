<?php

namespace App\Http\Controllers;

use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    

    public function index()
    {
        // Obtener la lista de usuarios
        $usuarios = User::selectRaw("CONCAT(nombre, ' ', apellido1, ' ', apellido2) AS nombre_completo, email, telefono")
                        ->get();

        // Pasar los usuarios a la vista
        return view('clientes', compact('usuarios'));
    }
}
