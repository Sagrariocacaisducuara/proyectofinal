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
        Schema::create('facturacion', function (Blueprint $table) {
            $table->id('Nro_Factura');
            $table->date('Fecha_Emision');
            $table->decimal('Monto_Total');
            $table->foreignId('Nro_Reserva');
            $table->foreignId('Id_Metodo_pago');
            $table->timestamps();

            $table->foreign('Nro_Reserva')->references('Nro_Reserva')->on('reserva')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Id_Metodo_pago')->references('Id_Metodo_pago')->on('metodo_pago')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturacion');
    }
};
