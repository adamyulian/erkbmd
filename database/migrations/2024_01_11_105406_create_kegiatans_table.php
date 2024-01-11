<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('unit_id');
            $table->string('nama_bidang');
            $table->string('kode_program');
            $table->string('nama_program');
            $table->string('kode_kegiatan');
            $table->string('nama_kegiatan');
            $table->string('sub_id');
            $table->string('kode_sub_kegiatan_sipd');
            $table->string('subtitle');
            $table->string('split_part');
            $table->string('indikator_sub_kegiatan');
            $table->string('target_capaian');
            $table->string('nomor_unit');
            $table->string('keterangan');
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
