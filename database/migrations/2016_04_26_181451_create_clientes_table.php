<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni');
            $table->string('poblacion');
            $table->string('codigo_postal');
            $table->string('telefono');
            $table->timestamps();
        });

        DB::table('clientes')->insert(
            array(
                'nombre' => 'Adolfo',
                'apellido' => 'Rodriguez',
                'dni' => '36854753A',
                'poblacion' => 'Barcelona',
                'codigo_postal' => '08005',
                'telefono' => '935589644'
            )
        );
        DB::table('clientes')->insert(
            array(
                'nombre' => 'Martín',
                'apellido' => 'Velasco',
                'dni' => '96585544Y',
                'poblacion' => 'Madrid',
                'codigo_postal' => '02505',
                'telefono' => '965584785'
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
        Schema::drop('clientes');
    }
}
