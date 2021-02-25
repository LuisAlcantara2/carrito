<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('codproducto');
			$table->string('nombre', 40);
			$table->decimal('precio', 10, 2);
            $table->integer('stock');
			$table->text('imagen');
			$table->text('descripcion');
			$table->integer('codcategoria')->unsigned();
			$table->foreign('codcategoria')
				  ->references('codcategoria')
				  ->on('categoria')
				  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
