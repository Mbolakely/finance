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
        Schema::create('decompte', function (Blueprint $table) {
            $table->id();
            $table->string('beneficiary');
            $table->string('deceased_name');
            $table->string('six_one');
            $table->string('six_two');
            $table->string('six_three');
            $table->string('six_four');
            $table->string('six_five');
            $table->string('six_six');
            $table->string('six_seven');
            $table->string('six_eight');
            $table->string('six_nine');
            $table->string('six_ten');
            $table->string('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decompte');
    }
};
