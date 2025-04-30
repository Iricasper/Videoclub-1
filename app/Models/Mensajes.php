<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    protected $table = 'mensajes';

    protected $fillable = [
        'user_emisor',
        'user_receptor',
        'mensaje',
    ];
}
