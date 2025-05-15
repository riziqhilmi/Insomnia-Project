<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('data_mahasiswa', function (Blueprint $table) {
        $table->id();
        $table->string('tahun_akademik');
        $table->enum('jenis_kelamin', ['Male', 'Female']);
        $table->string('lama_tidur');
        $table->string('kesulitan_konsentrasi');
        $table->string('ketidakhadiran_kuliah');
        $table->string('penggunaan_perangkat');
        $table->string('konsumsi_kafein');
        $table->string('aktivitas_olahraga');
        $table->string('tingkat_stres');
        $table->string('performa_akademik');
        $table->string('kategori_insomnia'); // hasil prediksi
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_mahasiswas');
    }
};
