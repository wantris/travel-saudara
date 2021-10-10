<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->char('code', 20)->primary();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('schedule_id')->unsigned();
            $table->char('fullname', 100);
            $table->char('email', 100);
            $table->char('wa_number', 15);
            $table->integer('total_seats');
            $table->integer('subtotal');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
