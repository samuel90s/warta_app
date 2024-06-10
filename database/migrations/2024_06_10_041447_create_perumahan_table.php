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
    Schema::dropIfExists('perumahans'); // Drop the table if it already exists

    Schema::create('perumahans', function (Blueprint $table) {
        $table->id('id_perumahan');
        $table->string('nama_perumahan');
        $table->string('alamat');
        $table->string('email')->nullable();
        $table->string('pengembang')->nullable();
        $table->timestamps(); // This will automatically add 'created_at' and 'updated_at' columns
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perumahan');
    }
};
