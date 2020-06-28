<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgalleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->integer("userId");
            $table->integer("serviceId");
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
        Schema::dropIfExists('sgalleries');
    }
}
