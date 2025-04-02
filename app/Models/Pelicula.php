<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'imagen',
        'genero',
        'precio_alquiler',
        'descripcion',  // Agregar el campo descripcion
    ];
}


