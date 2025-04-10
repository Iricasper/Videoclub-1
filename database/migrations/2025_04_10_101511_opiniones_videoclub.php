<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('opiniones_videoclub', function (Blueprint $table) {
            $table->increments('id_opinion');
            $table->foreignId('id_cliente')->constrained('users')->onDelete('cascade'); // Relación con la tabla users
            // Respuestas a las preguntas, sí o no
            $table->boolean('pregunta1');
            $table->boolean('pregunta2');
            $table->boolean('pregunta3');
            $table->boolean('pregunta4');
            $table->boolean('pregunta5');
            $table->boolean('pregunta6');
            $table->boolean('pregunta7');
            $table->boolean('pregunta8');
            $table->boolean('pregunta9');
            // Comentarios, opcionales
            $table->longText('comentario1')->nullable();
            $table->longText('comentario2')->nullable();
            $table->longText('comentario3')->nullable();
            $table->longText('comentario4')->nullable();
            $table->longText('comentario5')->nullable();
            $table->longText('comentario6')->nullable();
            $table->longText('comentario7')->nullable();
            $table->longText('comentario8')->nullable();
            $table->longText('comentario9')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opiniones_videoclub');
    }
};