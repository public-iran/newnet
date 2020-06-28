<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->string("slug");
            $table->text("content");
            $table->string("seoTitle");
            $table->text("seoContent");
            $table->string("tags");
            $table->string("status");
            $table->text('category_id');
            $table->unsignedInteger('mainPrice');
            $table->unsignedInteger('offPrice');
            $table->unsignedInteger('lucre');
            $table->string("imgName");
            $table->string("videoName");
            $table->text("feature");
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
        Schema::dropIfExists('products');
    }
}
