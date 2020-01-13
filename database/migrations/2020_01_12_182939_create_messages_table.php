<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');

            // FK
            $table->integer('user_transmitter_id')->unsigned()->nullable();
            $table->foreign('user_transmitter_id')->references('id')->on('users');

            // FK
            $table->integer('user_receiver_id')->unsigned()->nullable();
            $table->foreign('user_receiver_id')->references('id')->on('users');

            $table->longText('message')->nullable();

            $table->boolean('viewed')->nullable();



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
        Schema::dropIfExists('messages');
    }
}
