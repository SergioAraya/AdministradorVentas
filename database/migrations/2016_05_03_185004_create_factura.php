<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('fabrica_id')->unsigned();
            $table->double('importe', 15, 8);
            $table->boolean('pagado');

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('fabrica_id')->references('id')->on('fabricas');
            $table->timestamps();
        });

        DB::table('facturas')->insert(
            array(
                'cliente_id' => 1,
                'fabrica_id' => 2,
                'importe' => 220.56,
                'pagado' => true
            )
        );
        DB::table('facturas')->insert(
            array(
                'cliente_id' => 2,
                'fabrica_id' => 1,
                'importe' => 150.12,
                'pagado' => false
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facturas');
    }
}
