<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;  // Asegúrate de importar Carbon si no lo has hecho

class Alquiler extends Model
{
    use HasFactory;

    protected $table = 'alquileres';

    protected $fillable = [
        'id_cliente',
        'id_pelicula',
        'fecha_alquiler',
        'fecha_devolucion',
        'importe_alquiler',
    ];

    // Especificar que estos campos son fechas
    protected $dates = ['fecha_alquiler', 'fecha_devolucion'];

    // Relación con el modelo User (cliente)
    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_cliente');
    }

    // Relación con el modelo Pelicula
    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class, 'id_pelicula');
    }
}
