<?php

namespace App\Events;

use App\Models\Mensaje;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class MensajeEnviado implements ShouldBroadcastNow
{
    use InteractsWithSockets, SerializesModels;

    public $mensaje;

    public function __construct(Mensaje $mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function broadcastOn(): Channel
    {
        return new PrivateChannel('chat.' . $this->mensaje->user_receptor);
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->mensaje->id,
            'mensaje' => $this->mensaje->mensaje,
            'emisor_id' => $this->mensaje->user_emisor,
            'receptor_id' => $this->mensaje->user_receptor,
            'created_at' => $this->mensaje->created_at->toDateTimeString()
        ];
    }

    public function broadcastAs()
    {
        return 'mensaje.enviado';
    }
}
