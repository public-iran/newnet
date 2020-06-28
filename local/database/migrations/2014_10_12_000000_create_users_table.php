<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('reference_code');
            $table->string('reference');
            $table->string('up_line_code');
            $table->unsignedInteger('national_code');
            $table->string('mobile');
            $table->string('tel');
            $table->string('avatar');
            $table->unsignedInteger('postal_code');
            $table->string('password');
            $table->unsignedInteger('role');
            $table->unsignedInteger('surface');
            $table->unsignedInteger('level');
            $table->foreign('level')->references('id')->on('levels');
            $table->enum('status',['ACTIVE','INACTIVE']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
