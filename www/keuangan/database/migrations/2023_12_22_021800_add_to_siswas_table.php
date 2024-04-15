<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->unsignedBigInteger('kejuruan_id')->after('kelas_id')->nullable();
            $table->foreign('kejuruan_id')->references('id')->on('kejuruans')->onDelete('restrict');
            $table->unsignedBigInteger('tahun_ajaran_id')->after('kejuruan_id')->nullable();
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajarans')->onDelete('restrict');
            $table->unsignedBigInteger('pembayaran_id')->after('tahun_ajaran_id')->nullable();
            $table->foreign('pembayaran_id')->references('id')->on('pembayarans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            //
        });
    }
};
