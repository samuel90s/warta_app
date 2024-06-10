<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasKeamanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas_keamanans', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->nullable();
            $table->unsignedBigInteger('id_perumahan')->nullable();
            $table->foreign('id_perumahan')->references('id_perumahan')->on('perumahans')->onDelete('cascade');
            $table->string('sk_satpam')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas_keamanans');
    }
}
