<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{

    // Registrar una opinión
    public function create(Request $request) {
        $opinion = Opinion::updateOrCreate(
            ['id_pelicula' => $request['id_pelicula'], 'id_cliente' => auth()->id()],
            [
                'pregunta_1' => $request['pregunta_1'],
                'pregunta_2' => $request['pregunta_2'],
                'pregunta_3' => $request['pregunta_3'],
                'pregunta_4' => $request['pregunta_4'],
                'pregunta_5' => $request['pregunta_5'],
                'pregunta_6' => $request['pregunta_6'],
                'pregunta_7' => $request['pregunta_7'],
                'comentario_1' => $request->comentario_pregunta_1 !== null ? $request->comentario_pregunta_1 : "",
                'comentario_2' => $request->comentario_pregunta_2 !== null ? $request->comentario_pregunta_2 : "",
                'comentario_3' => $request->comentario_pregunta_3 !== null ? $request->comentario_pregunta_3 : "",
                'comentario_4' => $request->comentario_pregunta_4 !== null ? $request->comentario_pregunta_4 : "",
                'comentario_5' => $request->comentario_pregunta_5 !== null ? $request->comentario_pregunta_5 : "",
                'comentario_6' => $request->comentario_pregunta_6 !== null ? $request->comentario_pregunta_6 : "",
                'comentario_7' => $request->comentario_pregunta_7 !== null ? $request->comentario_pregunta_7 : "",


            ]
        );
        return redirect()->back()->with('success', '¡Opinión creada correctamente!');
    }
    // Mostrar la opinión del usuario para la película, si ya existe
    public function store(Request $request)
    {
        //dd($request->all());

        $validated = $request->validate([
            'id_pelicula' => 'required|exists:peliculas,id',
            'pregunta_1' => 'required|boolean',
            'pregunta_2' => 'required|boolean',
            'pregunta_3' => 'required|boolean',
            'pregunta_4' => 'required|boolean',
            'pregunta_5' => 'required|boolean',
            'pregunta_6' => 'required|boolean',
            'pregunta_7' => 'required|boolean',
        ]);

        // Crear o actualizar la opinión
        $opinion = Opinion::updateOrCreate(
            ['id_pelicula' => $validated['id_pelicula'], 'id_cliente' => auth()->id()],
            [
                'pregunta_1' => $validated['pregunta_1'],
                'pregunta_2' => $validated['pregunta_2'],
                'pregunta_3' => $validated['pregunta_3'],
                'pregunta_4' => $validated['pregunta_4'],
                'pregunta_5' => $validated['pregunta_5'],
                'pregunta_6' => $validated['pregunta_6'],
                'pregunta_7' => $validated['pregunta_7'],
                'comentario_1' => $request->comentario_1_2 !== null ? $request->comentario_1_2 : "",
                'comentario_2' => $request->comentario_2_2 !== null ? $request->comentario_2_2 : "",
                'comentario_3' => $request->comentario_3_2 !== null ? $request->comentario_3_2 : "",
                'comentario_4' => $request->comentario_4_2 !== null ? $request->comentario_4_2 : "",
                'comentario_5' => $request->comentario_5_2 !== null ? $request->comentario_5_2 : "",
                'comentario_6' => $request->comentario_6_2 !== null ? $request->comentario_6_2 : "",
                'comentario_7' => $request->comentario_7_2 !== null ? $request->comentario_7_2 : "",


            ]
        );

        return redirect()->back()->with('success', '¡Opinión modificada correctamente!');
    }

    public function edit($idPelicula)
    {
        // Obtén la opinión del usuario para la película específica
        $opinion = Opinion::where('id_pelicula', $idPelicula)
            ->where('id_cliente', auth()->id())
            ->first();

        // Si no existe la opinión, puedes manejar el error o devolver algo vacío.
        if (!$opinion) {
            return response()->json(['error' => 'No se encontró opinión para esta película.'], 404);
        }

        return response()->json($opinion);
    }


}

