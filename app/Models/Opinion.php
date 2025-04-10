<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $table = 'opiniones';
    protected $primaryKey = 'id_opinion';
    public $timestamps = true;

    protected $fillable = [
        'id_cliente',
        'id_pelicula',
        'pregunta_1',
        'pregunta_2',
        'pregunta_3',
        'pregunta_4',
        'pregunta_5',
        'pregunta_6',
        'pregunta_7',
        'comentario_1',
        'comentario_2',
        'comentario_3',
        'comentario_4',
        'comentario_5',
        'comentario_6',
        'comentario_7'
    ];

    // Casts para asegurarse de que se guarden como booleanos
    protected $casts = [
        'pregunta_1' => 'boolean',
        'pregunta_2' => 'boolean',
        'pregunta_3' => 'boolean',
        'pregunta_4' => 'boolean',
        'pregunta_5' => 'boolean',
        'pregunta_6' => 'boolean',
        'pregunta_7' => 'boolean',
    ];

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_cliente');
    }

    // Relación con Película
    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class, 'id_pelicula');
    }
}
