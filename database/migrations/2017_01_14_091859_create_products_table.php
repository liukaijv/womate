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
            $table->string('name');
            $table->integer('catalog_id');
            $table->string('description')->nullable();
            $table->integer('price');
            $table->string('price_display')->nullable();
            $table->integer('subscription')->nullable();
            $table->string('options')->nullable();
            $table->text('content');
            $table->string('cover_image');
            $table->integer('sort')->default(255);
            $table->boolean('disabled')->default(false);
            $table->boolean('is_recommend')->default(false);
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
        Schema::drop('products');
    }
}
