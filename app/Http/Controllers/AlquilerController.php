<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Pelicula;
use App\Models\Opinion;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class AlquilerController extends Controller
{
    public function index()
    {
        // Obtener los alquileres del usuario autenticado con la relación 'pelicula' y con los datos sobre las reseñas cargadas     
    $alquileres = Alquiler::select('*', 'alquileres.id as id_alquiler')
    ->join('peliculas', 'alquileres.id_pelicula', '=', 'peliculas.id')
    ->leftJoin('opiniones', 'alquileres.id_cliente', '=', 'opiniones.id_usuario')
    ->where('alquileres.id_cliente', Auth::id()) // Filtrar por el usuario autenticado
    ->get();
    
    return view('alquileres', compact('alquileres'));
    }

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

        // Crear el alquiler
        $alquiler = new Alquiler();
        $alquiler->id_cliente = $usuario_id;
        $alquiler->id_pelicula = $pelicula->id;
        $alquiler->fecha_alquiler = Carbon::now();
        $alquiler->fecha_devolucion = Carbon::now()->addDays(5);
        $alquiler->importe_alquiler = $pelicula->precio_alquiler;
        $alquiler->save();

        return back()->with('success', '¡Película alquilada con éxito!');
    }

    public function devolver($id)
    {
        
        $alquiler = Alquiler::where('id',$id)->first();
            $alquiler->fecha_devolucion = Carbon::now();
            $alquiler->save();
            return back()->with('success', 'Película devuelta correctamente.');
        
    }
}
