<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create("Cliente", function(Blueprint $table){
            $table->id();
            $table->string('Telefono');
            $table->string('Nombre');
            $table->string('Domicilio');
            $table->string('CorreoElectronico');
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
        Schema::dropIfExists("Cliente");
    }
}