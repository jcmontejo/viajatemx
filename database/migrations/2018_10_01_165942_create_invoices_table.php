<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number_invoice');
            $table->integer('fiscal_number');
            $table->string('client');
            $table->string('business_name');
            $table->string('rfc');
            $table->string('concept');
            $table->date('date');
            $table->string('ammount');
            $table->string('status');
            $table->date('payment_date');
            $table->string('observations')->nullable();
            $table->string('commission_provider')->nullable();
            $table->unsignedInteger('sale_id');
            $table->foreign('sale_id')->references('id')->on('sales');

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
        Schema::dropIfExists('invoices');
    }
}
