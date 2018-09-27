<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('provider');
            $table->string('client');
            $table->string('passenger');
            $table->string('key');
            $table->string('destination');
            $table->string('route');
            $table->date('departure_date');
            $table->string('schedule');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('commission_price', 8, 2);
            $table->string('tdc');
            $table->string('payment_status');
            $table->string('way_to_pay');
            $table->string('invoice')->nullable();
            $table->decimal('paid_out', 8, 2);
            $table->decimal('debt', 8, 2);
            $table->unsignedInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('sales');
    }
}
