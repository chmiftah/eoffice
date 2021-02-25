<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar_statuses', function (Blueprint $table) {
            $table->id();

            $table->integer('surat_keluar_id');
            $table->string('by_pengagenda');
            $table->string('by_atasan');
            $table->string('by_pegawai');
            $table->foreign('surat_keluar_id')->references('id')->on('surat_keluars')->onDelete('cascade');
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
        Schema::dropIfExists('surat_keluar_statuses');
    }
}
