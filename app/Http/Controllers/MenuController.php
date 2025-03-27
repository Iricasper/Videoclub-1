<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MenuController extends Controller
{
    public function mostrarMenu()
{
    // 🔥 Depura el contenido de la sesión
    //dd(session()->all());  // Asegúrate de que `user_id` esté presente

    // Obtener el ID del usuario desde la sesión
    $usuario_id = session('user_id');

    if ($usuario_id) {
        // Obtener el nombre del usuario por su ID
        $usuario = User::find($usuario_id);  // Usamos `find()` para buscar por ID

        // Verificar si se encontró el usuario y obtener su nombre
        $usuario = $usuario ? $usuario->nombre : "Usuario Invitado";
    } else {
        $usuario = "Usuario Invitado";  // Si no hay ID, asignar "Usuario Invitado"
    }

    return view('menu', compact('usuario'));
}

}


