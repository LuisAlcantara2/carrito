<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('codventa');
			$table->integer('numero_ticket');
			$table->date('fecha');
            $table->decimal('subtotal',18,2);
			$table->decimal('igv',18,2);
            $table->decimal('total',18,2);
			$table->integer('estado');
            $table->integer('codcliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
