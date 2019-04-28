<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporalMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporal_members', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('temporal_project_id')->unsigned()->nullable();
            $table->foreign('temporal_project_id')->references('id')->on('temporal_projects');

            $table->string('fullname', 800);
            $table->string('role', 255);
            $table->string('gender', 40);
            $table->string('image',255)->nullable();

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
        Schema::dropIfExists('temporal_members');
    }
}
