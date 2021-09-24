<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empleado', function(Blueprint $table){
            $table->id('NumEmpleado');
            $table->string('Telefono');
            $table->string('Nombre');
            $table->string('CorreoElectronico');
            $table->string('Domicilio');
            $table->string('RFC', 13); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Empleado');
        
    }
}
