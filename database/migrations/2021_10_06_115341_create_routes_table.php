<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('departure')->unsigned();
            $table->bigInteger('arrival')->unsigned();
            $table->integer('price');
            $table->tinyInteger('is_active')->default(0);
            $table->timestamps();

            $table->foreign('departure')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('arrival')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
