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
        Schema::create('cessations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('folder_id')
                ->constrained('folders')
                ->cascadeOnDelete()
                ->unique();
            $table->decimal('six_one', 8, 2);
            $table->decimal('six_two', 8, 2);
            $table->decimal('six_three', 8, 2);
            $table->decimal('six_four', 8, 2);
            $table->decimal('six_five', 8, 2);
            $table->decimal('six_six', 8, 2);
            $table->decimal('six_seven', 8, 2);
            $table->decimal('six_eight', 8, 2);
            $table->decimal('six_nine', 8, 2);
            $table->decimal('six_ten', 8, 2);
            $table->decimal('amount', 8, 2);
            $table->string('date_cessation');
            $table->string('fichier')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cessations');
    }
};
