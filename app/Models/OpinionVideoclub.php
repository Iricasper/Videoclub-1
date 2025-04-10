<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpinionVideoclub extends Model
{
    use HasFactory;

    protected $table = 'opiniones_videoclub';
    protected $primaryKey = 'id_opinion';
    public $timestamps = true;

    protected $fillable = [
        'id_opinion',
        'id_cliente',
        'pregunta1',
        'pregunta2',
        'pregunta3',
        'pregunta4',
        'pregunta5',
        'pregunta6',
        'pregunta7',
        'pregunta8',
        'pregunta9',
        'comentario1',
        'comentario2',
        'comentario3',
        'comentario4',
        'comentario5',
        'comentario6',
        'comentario7',
        'comentario8',
        'comentario9'
    ];

    // Casts para asegurarse de que se guarden como booleanos
    protected $casts = [
        'pregunta1' => 'boolean',
        'pregunta2' => 'boolean',
        'pregunta3' => 'boolean',
        'pregunta4' => 'boolean',
        'pregunta5' => 'boolean',
        'pregunta6' => 'boolean',
        'pregunta7' => 'boolean',
        'pregunta8' => 'boolean',
        'pregunta9' => 'boolean',
    ];

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_cliente');
    }
}
