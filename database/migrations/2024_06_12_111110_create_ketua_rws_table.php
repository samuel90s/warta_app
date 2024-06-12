<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetuaRwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketua_rws', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ketua_rw', 255);
            $table->bigInteger('telepon_ketua_rw');
            $table->unsignedBigInteger('id_perumahan');
            $table->timestamps();

            $table->foreign('id_perumahan')
                  ->references('id_perumahan')
                  ->on('perumahans')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ketua_rws');
    }
}
