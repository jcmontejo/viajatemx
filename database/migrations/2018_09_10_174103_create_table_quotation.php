<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableQuotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_client');
            $table->string('concept');
            $table->string('destination');
            $table->date('departure_date')->nullable();
            $table->date('return_date')->nullable();
            $table->string('transport')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->date('birthdate')->nullable();
            $table->string('facebook')->nullable();
            $table->string('suscribe')->nullable();
            $table->text('trip_description')->nullable();
            $table->string('attended')->nullable();
            $table->string('send')->nullable();
            $table->date('date_send')->nullable();
            $table->string('medium')->nullable();
            $table->string('status')->default('received');
            $table->text('notes')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('quotations');
    }
}
