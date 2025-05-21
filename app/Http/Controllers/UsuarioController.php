<?php

namespace App\Http\Controllers;

use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function exportarPDF()
    {
        // Obtén los usuarios con el nombre completo concatenado
        $usuarios = User::selectRaw("CONCAT(COALESCE(nombre, ''), ' ', COALESCE(apellido1, ''), ' ', COALESCE(apellido2, '')) AS nombre_completo, email, telefono")
            ->get();
    
        // Verifica que los datos están bien
        //dd($usuarios); // Esto debería mostrar los usuarios y su nombre completo
    
        // Carga la vista y pasa los usuarios
        $pdf = Pdf::loadView('pdf', compact('usuarios')); // Asegúrate de que 'pdf' es el nombre correcto de la vista
        return $pdf->download('clientes.pdf');
    }

    public function getUsersJson()
    {
        $users = User::select('id', DB::raw("CONCAT(nombre, ' ', apellido1, ' ', apellido2) AS nombre_completo"))
            ->where('id', '!=', Auth::id())
            ->get();
        return response()->json($users);
    }
    
}
