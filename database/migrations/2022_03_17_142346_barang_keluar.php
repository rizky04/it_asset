<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BarangKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('no_barang_keluar');
            $table->integer('id_barang');
            $table->string('no_asset');
            $table->integer('id_user');
            $table->integer('id_pegawai');
            $table->date('tgl_brg_keluar');
            $table->integer('jml_brg_keluar')->nullable();
            $table->bigInteger('total')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluar');
    }
}
