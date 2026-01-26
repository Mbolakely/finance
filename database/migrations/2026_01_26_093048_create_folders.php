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
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->unique();
            $table->string('date_death');
            $table->string('deceased_name');
            $table->string('deceased_job');
            $table->string('deceased_poste');
            $table->string('deceased_cin');
            $table->string('deceased_pension');
            $table->string('upload_date');
            $table->string('status')->default('en_cours');
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folders');
    }
};
