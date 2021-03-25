<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->dateTime('tgl_pengaduan');
            $table->char('nik',16);
            $table->text('isi_laporan');
             $table->text('lokasi_kejadian');
            $table->enum('kategori_kejadian', ['jalan', 'bansos']);
            $table->string('foto');
            $table->enum('status',['0','proses','selesai']);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('masyarakats')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
}
