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
        Schema::table('detail_pembelians', function (Blueprint $table) {
            $table->UnsignedBigInteger('pembelian_id')->after('id')->nullable();
            $table->foreign('pembelian_id')->references('id')->on('pembelians')->onDelete('restrict');
            $table->UnsignedBigInteger('produk_id')->after('pembelian_id')->nullable();
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_pembelians', function (Blueprint $table) {
            //
        });
    }
};
