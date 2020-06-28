<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path_pdf');
            $table->string('path_video');
            $table->string('path_sound');
            $table->string('path_image');
            $table->unsignedInteger('level_id');
            $table->unsignedInteger('surface_id');
            $table->unsignedInteger('user_id');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('surface_id')->references('id')->on('surfaces')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('files');
    }
}
