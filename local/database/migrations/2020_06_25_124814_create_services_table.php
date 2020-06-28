<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->string("slug");
            $table->text("content");
            $table->text("shortContent");
            $table->string("seoTitle");
            $table->text("seoContent");
            $table->string("tags");

            $table->string("status");
            $table->string("state");
            $table->string("stateId");
            $table->string("city");
            $table->string("cityId");
            $table->text("address");
            $table->string("phone");
            $table->string("mobile");

            $table->unsignedInteger('offPercent');
            $table->string("endDate");

            $table->text('category_id');

            $table->string("timeStartA");
            $table->string("timeEndA");
            $table->string("timeStartB");
            $table->string("timeEndB");

            $table->string("imgName");
            $table->text("imgPath");
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
        Schema::dropIfExists('services');
    }
}
