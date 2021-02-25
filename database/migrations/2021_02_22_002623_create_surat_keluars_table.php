<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id');
            $table->string('no_agenda')->nullable();
            $table->string('no_surat')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->string('hal_surat')->nullable();
            $table->string('sifat_surat')->nullable();
            $table->string('jenis_surat')->nullable();
            $table->string('tujuan_surat')->nullable();
            $table->string('lampiran_surat')->nullable();
            $table->text('file_surat')->nullable();
            $table->text('penandatangan_surat')->nullable();
            $table->text('ajuan_surat')->nullable();
            $table->string('keterangan')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keluars');
    }
}
