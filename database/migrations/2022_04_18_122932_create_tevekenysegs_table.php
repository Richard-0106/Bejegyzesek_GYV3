<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTevekenysegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tevekenysegs', function (Blueprint $table) {
            $table->bigIncrements('tevekenyseg_id');
            $table->string('tevekenyseg_nev');
            $table->integer('pontszam');
            

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
        Schema::dropIfExists('tevekenysegs');
    }
}
