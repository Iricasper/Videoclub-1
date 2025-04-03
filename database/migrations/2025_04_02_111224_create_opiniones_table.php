<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('opiniones', function (Blueprint $table) {
            $table->increments('id_opinion'); // PK autoincremental
            $table->foreignId('id_usuario')->constrained('users'); // Relación con usuarios
            $table->foreignId('id_pelicula')->constrained('peliculas'); // Relación con películas

            // Preguntas tipo Sí/No (Requeridas)
            $table->boolean('pregunta_1');// ¿Cumple el plazo de pago?
            $table->boolean('pregunta_2'); // ¿Abona la factura en tiempo razonable?
            $table->boolean('pregunta_3'); // ¿Contesta incidencias en tiempo razonable?
            $table->boolean('pregunta_4'); // ¿Te sientes valorado?
            $table->boolean('pregunta_5'); // ¿Es intuitiva la plataforma?
            $table->boolean('pregunta_6'); // ¿Recibes los contratos firmados?
            $table->boolean('pregunta_7'); // ¿Te gustaría seguir trabajando con el cliente?

            // Preguntas tipo Texto (Opcionales)
            $table->text('comentario_1')->nullable();
            $table->text('comentario_2')->nullable();
            $table->text('comentario_3')->nullable();
            $table->text('comentario_4')->nullable();
            $table->text('comentario_5')->nullable();
            $table->text('comentario_6')->nullable();
            $table->text('comentario_7')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opiniones');
    }
};

