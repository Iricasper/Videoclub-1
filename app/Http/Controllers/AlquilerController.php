<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class AlquilerController extends Controller
{


    public function store(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $pelicula = Pelicula::findOrFail($id);
        $usuario_id = Auth::id();

        // Verificar si el usuario ya tiene esta película alquilada y no la ha devuelto
        $alquilerExistente = Alquiler::where('id_cliente', $usuario_id)
            ->where('id_pelicula', $id)
            ->where('fecha_devolucion', '>', Carbon::now())
            ->first();
        

        if ($alquilerExistente) {
            return back()->with('error', 'Ya tienes esta película alquilada.');
        }

        // Verificar stock antes de alquilar
        /*if ($pelicula->stock <= 0) {
            return back()->with('error', 'No hay copias disponibles para alquilar.');
        }*/

        // Crear el alquiler
        $alquiler = new Alquiler();
        $alquiler->id_cliente = $usuario_id;
        $alquiler->id_pelicula = $pelicula->id;
        $alquiler->fecha_alquiler = Carbon::now();
        $alquiler->fecha_devolucion = Carbon::now()->addDays(5);
        $alquiler->importe_alquiler = $pelicula->precio_alquiler;
        $alquiler->save();

        // Reducir stock de la película
        //$pelicula->stock -= 1;
        //$pelicula->save();

        return back()->with('success', '¡Película alquilada con éxito!');
    }
}