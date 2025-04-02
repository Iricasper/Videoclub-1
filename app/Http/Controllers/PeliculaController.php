<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Alquiler;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function __construct()
    {
        // Si es necesario, puedes activar la autenticación para proteger las rutas
        //$this->middleware('auth');
    }

    // Mostrar todas las películas
    public function index()
    {
        $peliculas = Pelicula::all();  // Obtener todas las películas de la base de datos

        return view('peliculas', compact('peliculas')); // Pasar las películas a la vista
    }

    // Alquilar una película
    public function alquilar($id)
    {
        // Encontrar la película seleccionada
        $pelicula = Pelicula::find($id);

        if (!$pelicula) {
            return redirect()->back()->with('error', 'Película no encontrada');
        }

        // Calcular la fecha de alquiler y fecha de devolución (3 días después)
        $fecha_alquiler = Carbon::now(); // Fecha actual
        $fecha_devolucion = $fecha_alquiler->copy()->addDays(3); // Sumar 3 días a la fecha de alquiler

        // Crear el alquiler en la base de datos
        $alquiler = Alquiler::create([
            'id_cliente' => auth()->user()->id, // Asumiendo que el cliente está autenticado
            'id_pelicula' => $pelicula->id,
            'fecha_alquiler' => $fecha_alquiler,
            'fecha_devolucion' => $fecha_devolucion,
            'importe_alquiler' => $pelicula->precio_alquiler,
        ]);

        // Redirigir a la página de alquileres con un mensaje de éxito
        return redirect()->route('alquileres')->with('success', 'Película alquilada con éxito');
    }

    // Mostrar los alquileres del cliente
    public function alquileres()
    {
        // Obtener todos los alquileres del cliente autenticado
        $alquileres = Alquiler::where('id_cliente', auth()->user()->id)->get();

        return view('alquileres', compact('alquileres')); // Pasar los alquileres a la vista
    }

    // Devolver una película
    public function devolver($id)
    {
        // Encontrar el alquiler correspondiente
        $alquiler = Alquiler::find($id);

        // Comprobar si el alquiler existe y si el cliente es el propietario
        if (!$alquiler || $alquiler->id_cliente != auth()->user()->id) {
            return redirect()->back()->with('error', 'No se encuentra el alquiler o no tienes permiso');
        }

        // Eliminar el alquiler (la película se considera devuelta)
        $alquiler->delete();

        return redirect()->route('alquileres')->with('success', 'Película devuelta con éxito');
    }

    // Ampliar el plazo de un alquiler
    public function ampliarPlazo($id)
    {
        // Encontrar el alquiler correspondiente
        $alquiler = Alquiler::find($id);

        // Comprobar si el alquiler existe y si el cliente es el propietario
        if (!$alquiler || $alquiler->id_cliente != auth()->user()->id) {
            return redirect()->back()->with('error', 'No se encuentra el alquiler o no tienes permiso');
        }

        // Ampliar la fecha de devolución en 3 días
        $alquiler->fecha_devolucion = $alquiler->fecha_devolucion->addDays(3);
        $alquiler->save(); // Guardar los cambios

        return redirect()->route('alquileres')->with('success', 'Plazo de alquiler ampliado con éxito');
    }
}
