<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class RegistroController extends Controller{

    public function mostrarRegistro(){
        return view('registro');
    }



    public function registrar(Request $request){
        $datos = $request -> validate(
            ['nombre => required|String|max:50',
            'apellido1 => required|String|max:50',
            'apellido2 => required|String|max:50',
            'telefono => required|String|max:15',
            'email => required|email|max:100',
            'password => required|confirmed|min:8']);

        if (Auth::attempt($datos)) {
            $request->session()->regenerate();
    
            return redirect()->intended('/login');
        }

        $user = User::create(
            [
            'nombre' => $request->nombre,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => bcrypt($request->password)
            ]);

        //Auth::login($user);

        
        return redirect()->intended('/login');

        
    }

}