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
        Schema::create('factura_servicio', function (Blueprint $table) {
            $table->id('Nro_Factura_Servicio');
            $table->integer('Cantidad');
            $table->foreignId('Nro_Factura');
            $table->foreignId('ID_Servicio');
            $table->timestamps();

            $table->foreign('Nro_Factura')->references('Nro_Factura')->on('facturacion')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_Servicio')->references('ID_Servicio')->on('servicio')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_servicio');
    }
};
