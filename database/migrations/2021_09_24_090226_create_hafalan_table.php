<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHafalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hafalan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('kelas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('siswa_id')->constrained('siswa')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kitab_id')->constrained('kitab')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('bab_id')->constrained('bab')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('ayat');
            $table->text('catatan')->nullable();
            $table->date('tanggal');
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
        Schema::dropIfExists('hafalan');
    }
}
