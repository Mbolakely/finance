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
        Schema::create('controle_financier', function (Blueprint $table) {
            $table->string('Numero_Visa');
            $table->date('Date_Visa');
            $table->string('Delegue_Regional')->default('Le Délégué Régional du Contrôle Financier - Ihorombe');
            $table->string('Nom_Beneficiaire');
            $table->string('Nom_Defunt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_controle_financier');
    }
};
