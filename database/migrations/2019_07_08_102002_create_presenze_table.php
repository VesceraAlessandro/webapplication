<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresenzeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presenze', function (Blueprint $table) {
            $table->bigIncrements('idPresenze');
			$table->timestamp("Data/Ora");
			$table->string("Stato");
			$table->bigInteger('idUtenti')->unsigned();
			$table->foreign('idUtenti')->references('idUtenti')->on('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presenze');
    }
}
