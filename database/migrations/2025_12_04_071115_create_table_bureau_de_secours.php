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
        Schema::create('bureau_de_secours', function (Blueprint $table) {
            $table->string('Numero_Visa');
            $table->date('Date_Visa');
            $table->string('Numero_Bureau_Secours');
            $table->date('Date_Decision');
            $table->string('Nom_Beneficiaire');
            $table->string('Numero_Pension');
            $table->double('Budget_Alloue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_bureau_de_secours');
    }
};
