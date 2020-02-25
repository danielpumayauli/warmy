<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporalProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporal_projects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name',255);
            $table->string('category')->nullable();
            $table->string('image',255)->nullable();
            $table->tinyInteger('female_ceo');
            $table->integer('quantity_female');
            $table->integer('quantity_male');

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
        Schema::dropIfExists('temporal_projects');
    }
}
