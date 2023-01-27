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
        Schema::create('perkiraans', function (Blueprint $table) {
            $table->id();
            $table->string('kodeperkiraan')->unique();
            $table->string('namaperkiraan');
            $table->enum('jenisperkiraan',  ['Debit', 'Kredit'])->default('Debit');
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
        Schema::dropIfExists('perkiraans');
    }
};
