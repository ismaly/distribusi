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
        Schema::create('distribution', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('stok');
            $table->integer('jumlah_terjual');
            $table->date('tanggal_transaksi');
            $table->unsignedBigInteger('jenis_barang');
            $table->timestamps();

            $table->foreign('jenis_barang')
                ->references('id')
                ->on('jenis_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribution');
    }
};
