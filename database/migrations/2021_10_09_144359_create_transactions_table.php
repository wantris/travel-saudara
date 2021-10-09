<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->char('bill_code', 20)->primary();
            $table->bigInteger('user_id')->unsigned();
            $table->char('reservation_code', 20);
            $table->bigInteger('bank_payment_id')->unsigned();
            $table->integer('total');
            $table->tinyInteger('status');

            $table->timestamps();

            $table->foreign('bank_payment_id')->references('id')->on('bank_payments')->onDelete('cascade');
            $table->foreign('reservation_code')->references('code')->on('reservations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
