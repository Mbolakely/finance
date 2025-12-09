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
        Schema::create('projet_decision', function (Blueprint $table) {
            $table->string('Numero_Decision');
            $table->Integer('Numero_Visa');
            $table->Integer('Numero_Matricule');
            $table->Integer('Numero_CIN');
            $table->string('Nom_defunt');
            $table->string('Nom_Beneficiaire');
            $table->Integer('Numero_Pension');
            $table->date('Date_Deces');
            $table->float('Secour_Deces');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_projet_decision');
    }
};
