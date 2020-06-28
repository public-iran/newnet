<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListtargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listtargets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->text('target');
            $table->text('reason');
            $table->text('price');
            $table->text('income');
            $table->text('position');
            $table->text('balance');
            $table->text('date');
            $table->text('achieve');
            $table->text('5reason');
            $table->enum('confirmation',['YES','NO']);
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
        Schema::dropIfExists('listtargets');
    }
}
