<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->id('id_petugas_keamanan');
            $table->string('nama', 255);
            $table->string('alamat', 255)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['pria', 'wanita'])->nullable();
            $table->bigInteger('telepon')->nullable();
            $table->bigInteger('nik')->nullable();
            $table->unsignedBigInteger('id_perumahan')->nullable();
            $table->binary('sk_satpam')->nullable()->comment('Surat Keputusan Satpam (PDF atau DOCX)');
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('id_perumahan')->references('id_perumahan')->on('perumahans')->onDelete('cascade');
        });

        // Add constraint for checking MIME type on sk_satpam column
        DB::statement('ALTER TABLE petugas_keamanans ADD CONSTRAINT check_sk_satpam_mime CHECK (sk_satpam IS NULL OR sk_satpam LIKE "%.pdf" OR sk_satpam LIKE "%.docx")');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('petugas_keamanans', function (Blueprint $table) {
            $table->dropForeign(['id_perumahan']);
        });

        Schema::dropIfExists('petugas_keamanans');
    }
}
