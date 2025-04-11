<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Models\OpinionVideoclub;
use Illuminate\Http\Request;

class OpinionVideoclubController extends Controller
{
    // Registrar una opinión
    public function create(Request $request) {
        $opinion = OpinionVideoclub::updateOrCreate(
            ['id_opinion' => $request['id_opinion'], 'id_cliente' => auth()->id()],
            [
                'pregunta1' => $request['pregunta1'],
                'pregunta2' => $request['pregunta2'],
                'pregunta3' => $request['pregunta3'],
                'pregunta4' => $request['pregunta4'],
                'pregunta5' => $request['pregunta5'],
                'pregunta6' => $request['pregunta6'],
                'pregunta7' => $request['pregunta7'],
                'pregunta8' => $request['pregunta8'],
                'pregunta9' => $request['pregunta9'],
                'comentario1' => $request->comentario_pregunta1 !== null ? $request->comentario_pregunta1 : "",
                'comentario2' => $request->comentario_pregunta2 !== null ? $request->comentario_pregunta2 : "",
                'comentario3' => $request->comentario_pregunta3 !== null ? $request->comentario_pregunta3 : "",
                'comentario4' => $request->comentario_pregunta4 !== null ? $request->comentario_pregunta4 : "",
                'comentario5' => $request->comentario_pregunta5 !== null ? $request->comentario_pregunta5 : "",
                'comentario6' => $request->comentario_pregunta6 !== null ? $request->comentario_pregunta6 : "",
                'comentario7' => $request->comentario_pregunta7 !== null ? $request->comentario_pregunta7 : "",
                'comentario8' => $request->comentario_pregunta8 !== null ? $request->comentario_pregunta8 : "",
                'comentario9' => $request->comentario_pregunta9 !== null ? $request->comentario_pregunta9 : "",


            ]
        );
        return redirect()->back()->with('success', '¡Opinión creada correctamente!');
    }
    // Mostrar la opinión del usuario para la película, si ya existe

        // Crear o actualizar la opinión
        public function store(Request $request)
        {
            
            dd($request);
            $validated = $request->validate([
                'pregunta1' => 'required|boolean',
                'pregunta2' => 'required|boolean',
                'pregunta3' => 'required|boolean',
                'pregunta4' => 'required|boolean',
                'pregunta5' => 'required|boolean',
                'pregunta6' => 'required|boolean',
                'pregunta7' => 'required|boolean',
                'pregunta8' => 'required|boolean',
                'pregunta9' => 'required|boolean'
            ]);
            
            // Crear o actualizar la opinión
            $opinion = OpinionVideoclub::updateOrCreate(
                [
                    'id_cliente' => $request['id_cliente']],
                    ['pregunta1' => $request['pregunta1'],
                    'pregunta2' => $request['pregunta2'],
                    'pregunta3' => $request['pregunta3'],
                    'pregunta4' => $request['pregunta4'],
                    'pregunta5' => $request['pregunta5'],
                    'pregunta6' => $request['pregunta6'],
                    'pregunta7' => $request['pregunta7'],
                    'pregunta8' => $request['pregunta8'],
                    'pregunta9' => $request['pregunta9'],
                    'comentario1' => $request->comentario1_2 !== null ? $request->comentario1_2 : "",
                    'comentario2' => $request->comentario2_2 !== null ? $request->comentario2_2 : "",
                    'comentario3' => $request->comentario3_2 !== null ? $request->comentario3_2 : "",
                    'comentario4' => $request->comentario4_2 !== null ? $request->comentario4_2 : "",
                    'comentario5' => $request->comentario5_2 !== null ? $request->comentario5_2 : "",
                    'comentario6' => $request->comentario6_2 !== null ? $request->comentario6_2 : "",
                    'comentario7' => $request->comentario7_2 !== null ? $request->comentario7_2 : "",
                    'comentario8' => $request->comentario8_2 !== null ? $request->comentario8_2 : "",
                    'comentario9' => $request->comentario9_2 !== null ? $request->comentario9_2 : "",
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

