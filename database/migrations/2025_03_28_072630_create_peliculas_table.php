<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('imagen')->nullable(); // Para almacenar la URL de la imagen
            $table->string('genero')->nullable();
            $table->decimal('precio_alquiler', 5, 2)->default(3.99);
            $table->decimal('precio_compra', 5, 2)->default(9.99);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
};

