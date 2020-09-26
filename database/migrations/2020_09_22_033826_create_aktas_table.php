<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('aktas', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('id_notaris');
        //     $table->string('jenis_akta');
        //     $table->bigInteger('nomor_jurnal');
        //     $table->integer('nomor_akta');
        //     $table->dateTime('tanggal_akta');
        //     $table->text('penghadap');
        //     $table->string('nama_pengguna');
        //     $table->string('pengguna_edit')->nullable();
        //     $table->integer('id_laporan')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aktas');
    }
}
