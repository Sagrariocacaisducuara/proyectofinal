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
        Schema::create('habitacion', function (Blueprint $table) {
            $table->id('Nro_Habitacion')->unique();
            $table->foreignId('ID_Hotel');
            $table->foreignId('Id_Tipo_Habitacion');
            $table->foreignId('Id_inventario');
            $table->timestamps();

            $table->foreign('ID_Hotel')->references('ID_Hotel')->on('hotel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Id_Tipo_Habitacion')->references('Id_Tipo_Habitacion')->on('tipo_habitacion')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Id_inventario')->references('Id_inventario')->on('inventario')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitacion');
    }
};
