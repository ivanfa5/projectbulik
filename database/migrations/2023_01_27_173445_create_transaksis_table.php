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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kodetransaksi')->unique();
            $table->date('tanggaltransaksi');
            $table->string('kdperkiraan');
            $table->string('keterangan');
            $table->bigInteger('transaksidebit');
            $table->bigInteger('transaksikredit');
            $table->timestamps();
        });
        Schema::table('transaksis', function (Blueprint $table) {
            $table->foreign('kdperkiraan')->references('kodeperkiraan')->on('perkiraans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
