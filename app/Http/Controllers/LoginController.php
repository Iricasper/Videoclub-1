<?php

namespace App\Http\Controllers;

use App\Models\User;
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

            //Actualizamos el valor de la columna isLogged
            $logeado = User::where('id', Auth::user()->id)->first();
            $logeado->isLogged = 1;
            $logeado->save();

            return redirect()->intended('/menu'); // Redirige al menú principal
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    /**
     * Cerrar sesión.
     */
    public function logout(Request $request)
    {
        //dd($request);
        //Actualizamos el valor de la columna isLogged
        $logeado = User::where('id', Auth::user()->id)->first();
        $logeado->isLogged = 0;
        $logeado->save();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Redirige al login después de cerrar sesión
    }
}
