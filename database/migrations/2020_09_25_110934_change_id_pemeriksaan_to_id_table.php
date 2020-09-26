<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIdPemeriksaanToIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_pemeriksaan_protokol', function (Blueprint $table) {
            $table->renameColumn('id_pemeriksaan_protokol', 'id');
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
        Schema::table('tbl_pemeriksaan_protokol', function (Blueprint $table) {
            $table->renameColumn('id', 'id_pemeriksaan_protokol');
        });
    }
}
