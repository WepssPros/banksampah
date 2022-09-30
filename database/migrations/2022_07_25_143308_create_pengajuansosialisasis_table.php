<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansosialisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuansosialisasis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->nullable();
            $table->string('nama_organisasi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jumlahwarga')->nullable();
            $table->longText('alasan')->nullable();
            $table->date('tgl_pelaksana')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('status')->default('Diproses');
            $table->softDeletes();
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
        Schema::dropIfExists('pengajuansosialisasis');
    }
}
