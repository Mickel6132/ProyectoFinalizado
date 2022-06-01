<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->id('fac_id');
            $table->foreignId('cli_id')->references('cli_id')->on('clientes');
            $table->string('fac_no');
            $table->date('fac_fecha');
            $table->float('fac_total');
            $table->float('fac_iva');//trasnferencia efectivo tarjeta
           $table->float('fac_descuento');
            $table->string('fac_observaciones');
            $table->integer('fac_estado')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}
