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
        Schema::create('secours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('folder_id')
                ->constrained('folders')
                ->cascadeOnDelete()
                ->unique();
            $table->string('numero_secours');
            $table->string('fichier')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secours');
    }
};
