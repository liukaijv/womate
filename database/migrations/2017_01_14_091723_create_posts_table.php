<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catalog_id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('description')->nullalbe();
            $table->text('content');
            $table->string('cover_image')->nullable();
            $table->boolean('visible')->default(true);
            $table->boolean('is_recommend')->default(false);
            $table->integer('sort')->default(0);
            $table->integer('hits')->default(0);
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
        Schema::drop('posts');
    }
}
