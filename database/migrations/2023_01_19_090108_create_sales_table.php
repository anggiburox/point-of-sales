<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->string('ID_Sales',20)->primary();
            $table->string('ID_Barang', 50);
            $table->string('ID_Customer', 50);
            $table->integer('Qty');
            $table->date('Tanggal_Transaksi');
            $table->string('Harga',50);
            $table->string('Metode_Pembayaran',50);
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
        Schema::dropIfExists('sales');
    }
};