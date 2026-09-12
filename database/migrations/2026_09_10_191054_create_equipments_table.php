<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('serial_number')->unique(); // unicité métier obligatoire
            $table->string('location');
            $table->enum('status', [
                'disponible',
                'en_utilisation',
                'en_maintenance',
                'hors_service'
            ]);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Supprime la table si on rollback la migration
        Schema::dropIfExists('equipments');
    }
};