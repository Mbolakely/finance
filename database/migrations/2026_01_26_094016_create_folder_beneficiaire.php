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
        Schema::create('folder_beneficiaire', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiaire_id')
                ->constrained('beneficiaires')
                ->cascadeOnDelete();

            $table->foreignId('folder_id')
                ->constrained('folders')
                ->cascadeOnDelete();

            $table->string('role')->nullable();
            $table->timestamps();

             $table->unique(['beneficiaire_id', 'folder_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folder_beneficiaire');
    }
};
