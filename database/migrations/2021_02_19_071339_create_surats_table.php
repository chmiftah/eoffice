<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id');
            $table->string('jenis_surat');
            $table->date('tgl_terima');
            $table->string('no_agenda');
            $table->string('tujuan');
            $table->date('tgl_surat');
            $table->string('no_surat');
            $table->string('file_lampiran')->nullable();
            $table->string('perihal');
            $table->string('asal_surat');
            $table->text('deskripsi');
            $table->string('file_surat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surats');
    }
}
