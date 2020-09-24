<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_notaris', 100);
            $table->string('email', 50);
            $table->string('tempat_lahir', 50)->nullable();
            $table->dateTime('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin_notaris', 20)->nullable();
            $table->string('npwp_notaris', 20)->nullable();
            $table->string('notaris_ttd')->nullable();
            $table->smallInteger('bermasalah')->nullable();
            $table->string('nama_pasangan_notaris', 100)->nullable();
            $table->string('npwp_pasangan_notaris', 100)->nullable();
            $table->string('status_perpajakan_notaris', 2)->nullable();
            $table->text('nomor_ijazah_mkn')->nullable();
            $table->date('tanggal_ijazah_mkn')->nullable();
            $table->smallInteger('id_kota_kab')->nullable();
            $table->text('laporan_sumpah_notaris')->nullable();
            $table->date('tanggal_pengiriman_spesimen')->nullable();
            $table->string('no_telepon_kantor_notaris', 20)->nullable();
            $table->string('no_faks_notaris', 20)->nullable();
            $table->text('alamat_kantor')->nullable();
            $table->string('no_telepon_notaris', 20)->nullable();
            $table->text('alamat_rumah')->nullable();
            $table->string('bap_sumpah_jabatan', 50)->nullable();
            $table->string('pemegang_protokol_sk_penunjukan', 50)->nullable();
            $table->string('nomor_sk_penunjukan', 50)->nullable();
            $table->date('tanggal_sk_penunjukan')->nullable();
            $table->string('nomor_sk_pindah', 50)->nullable();
            $table->date('tanggal_sk_pindah')->nullable();
            $table->string('wilayah_sebelum_pindah', 50)->nullable();
            $table->string('nomor_sk_perpanjangan_jabatan', 50)->nullable();
            $table->date('tanggal_sk_perpanjangan_jabatan')->nullable();
            $table->string('nomor_sk_pemberhentian', 50)->nullable();
            $table->text('keterangan_pemberhentian')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('seo_url')->nullable();
            $table->string('nomor_sk_pengangkatan', 50)->nullable();
            $table->date('tanggal_sk_pengangkatan')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('jumlah_kunjungan')->nullable();
            $table->string('foto_notaris')->nullable();
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
        Schema::dropIfExists('notaris');
    }
}
