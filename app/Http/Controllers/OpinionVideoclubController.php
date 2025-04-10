<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Models\OpinionVideoclub;
use Illuminate\Http\Request;

class OpinionVideoclubController extends Controller
{
    // Mostrar la opinión del usuario para la película, si ya existe
    public function store(Request $request)
    {
        
        // $validated = $request->validate([
        //     'pregunta1' => 'required|boolean',
        //     'pregunta2' => 'required|boolean',
        //     'pregunta3' => 'required|boolean',
        //     'pregunta4' => 'required|boolean',
        //     'pregunta5' => 'required|boolean',
        //     'pregunta6' => 'required|boolean',
        //     'pregunta7' => 'required|boolean',
        //     'pregunta8' => 'required|boolean',
        //     'pregunta9' => 'required|boolean'
        // ]);
        
        // Crear o actualizar la opinión
        dd($request);
        $opinion = OpinionVideoclub::updateOrCreate(
            [
                'id_cliente' => $request['id_cliente'],
                'pregunta1' => $request['pregunta1'],
                'pregunta2' => $request['pregunta2'],
                'pregunta3' => $request['pregunta3'],
                'pregunta4' => $request['pregunta4'],
                'pregunta5' => $request['pregunta5'],
                'pregunta6' => $request['pregunta6'],
                'pregunta7' => $request['pregunta7'],
                'pregunta8' => $request['pregunta8'],
                'pregunta9' => $request['pregunta9'],
                'comentario1' => $request->comentario1 !== null ? $request->comentario1 : "",
                'comentario2' => $request->comentario2 !== null ? $request->comentario2 : "",
                'comentario3' => $request->comentario3 !== null ? $request->comentario3 : "",
                'comentario4' => $request->comentario4 !== null ? $request->comentario4 : "",
                'comentario5' => $request->comentario5 !== null ? $request->comentario5 : "",
                'comentario6' => $request->comentario6 !== null ? $request->comentario6 : "",
                'comentario7' => $request->comentario7 !== null ? $request->comentario7 : "",
                'comentario8' => $request->comentario8 !== null ? $request->comentario8 : "",
                'comentario9' => $request->comentario9 !== null ? $request->comentario9 : "",
                ]
            );

            return redirect()->back()->with('success', '¡Opinión enviada correctamente!');
        }

    public function edit($idOpinion)
    {
        // Obtén la opinión del usuario para la película específica
        $opinion_videoclub = OpinionVideoclub::where('id_cliente', auth()->id())
            ->first();

        // Si no existe la opinión, puedes manejar el error o devolver algo vacío.
        if (!$opinion_videoclub) {
            return response()->json(['error' => 'No se encontró opinión para este Videoclub .'], 404);
        }

        return response()->json($opinion_videoclub);
    }


}

