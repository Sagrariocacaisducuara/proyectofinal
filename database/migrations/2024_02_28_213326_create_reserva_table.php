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
        Schema::create('reserva', function (Blueprint $table) {
            $table->id('Nro_Reserva');
            $table->date('Fecha_Entrada');
            $table->date('Fecha_Salida');
            $table->string('Estado_Reserva');
            $table->foreignId('Nro_doc');
            $table->foreignId('Nro_Habitacion');
            $table->foreignId('ID_Servicio');
            
            $table->timestamps();

            $table->foreign('Nro_doc')->references('Nro_doc')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Nro_Habitacion')->references('Nro_Habitacion')->on('habitacion')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('reserva');
    }
};
