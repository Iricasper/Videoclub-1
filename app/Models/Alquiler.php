<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // Relación con el modelo User (cliente)
    public function cliente()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // Relación con el modelo Pelicula
    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class, 'id');
    }
}

