<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_mensajes_table.php

    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_emisor')->constrained('users')->onDelete('cascade');  // Relación con el emisor
            $table->foreignId('user_receptor')->constrained('users')->onDelete('cascade');  // Relación con el receptor
            $table->text('mensaje');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};