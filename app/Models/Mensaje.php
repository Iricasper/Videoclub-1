<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_emisor',
        'user_receptor',
        'mensaje'
    ];

    // Relación con el emisor
    public function emisor()
    {
        return $this->belongsTo(User::class, 'user_emisor');
    }

    // Relación con el receptor
    public function receptor()
    {
        return $this->belongsTo(User::class, 'user_receptor');
    }
}
