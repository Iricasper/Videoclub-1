<?php

namespace App\Http\Controllers;

use App\Events\MensajeEnviado;
use App\Models\Mensajes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MensajeController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validar el mensaje
        $validated = $request->validate([
            'mensaje' => 'required|string|max:255',
            'user_receptor' => 'required|exists:users,id',
        ]);

        // Crear el mensaje en la base de datos
        $mensaje = Mensajes::create([
            'user_emisor' => Auth::id(),  // El usuario autenticado
            'user_receptor' => $validated['user_receptor'],
            'mensaje' => $validated['mensaje'],
        ]);

        // Emitir el evento de broadcasting
        broadcast(new MensajeEnviado($mensaje));  // Emitir el evento

        return response()->json(['mensaje' => $mensaje], 200);
    }

    public function getMessages($user1, $user2)
    {
        // Obtener los mensajes entre dos usuarios
        $messages = Mensajes::where(function ($query) use ($user1, $user2) {
            $query->whereIn('user_emisor', [$user1, $user2])
                ->whereIn('user_receptor', [$user1, $user2])
                ->whereColumn('user_emisor', '!=', 'user_receptor');
        })->get();

        return response()->json($messages);
    }
}
