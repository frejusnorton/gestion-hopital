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
        Schema::create('specialite_medecins', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string(column: 'nom')->unique();
            $table->string(column: 'statut')->default(true);;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialite_medecins');
    }
};
