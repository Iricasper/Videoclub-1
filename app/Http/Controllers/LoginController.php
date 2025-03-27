<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Mostrar la vista de login.
     */
    public function mostrarLogin()
    {
        return view('login'); // Asegúrate de que el archivo login.blade.php existe en resources/views
    }

    /**
     * Procesar el inicio de sesión.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Guarda el ID del usuario en la sesión manualmente
            session(['user_id' => Auth::user()->id]);

            return redirect()->intended('/menu'); // Redirige al menú principal
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    /**
     * Cerrar sesión.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Redirige al login después de cerrar sesión
    }
}
