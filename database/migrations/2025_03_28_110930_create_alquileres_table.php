<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function down()
    {
        Schema::dropIfExists('alquileres');
    }
    public function up()
    {
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cliente')->constrained('users')->onDelete('cascade'); // Relación con la tabla users
            $table->foreignId('id_pelicula')->constrained('peliculas')->onDelete('cascade'); // Relación con la tabla peliculas
            $table->date('fecha_alquiler');
            $table->date('fecha_devolucion');
            $table->decimal('importe_alquiler', 5, 2); // El precio del alquiler
            $table->timestamps();
        });
    }

    
};

