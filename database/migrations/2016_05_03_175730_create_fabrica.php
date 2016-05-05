<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabrica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabricas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('propietario');
            $table->string('dni');
            $table->string('poblacion');
            $table->string('codigo_postal');
            $table->string('telefono');
            $table->integer('comision');
            $table->timestamps();
        });

        DB::table('fabricas')->insert(
            array(
                'nombre' => 'Montcada',
                'propietario' => 'Rodrigo Jaén',
                'dni' => '45854751A',
                'poblacion' => 'Barcelona',
                'codigo_postal' => '08011',
                'telefono' => '935685474',
                'comision' => 12
            )
        );
        DB::table('fabricas')->insert(
            array(
                'nombre' => 'Toledo',
                'propietario' => 'Mar Martínez',
                'dni' => '85452211R',
                'poblacion' => 'Madrid',
                'codigo_postal' => '02541',
                'telefono' => '985547452',
                'comision' => 9
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
        Schema::drop('fabricas');
    }
}
