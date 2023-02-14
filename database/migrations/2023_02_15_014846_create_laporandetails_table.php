<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporandetails', function (Blueprint $table) {
            $table->id();
            $table->string('kodetransaksi');
            $table->date('tanggaltransaksi');
            $table->string('kdperkiraan');
            $table->string('keterangan');
            $table->bigInteger('transaksidebit');
            $table->bigInteger('transaksikredit');
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
        Schema::dropIfExists('laporandetails');
    }
};
