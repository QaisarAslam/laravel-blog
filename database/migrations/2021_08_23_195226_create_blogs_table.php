<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->bigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('category_id');
            // $table->bigInteger('category_id')->unsigned();
            $table->string('title', 255);
            $table->string('url', 255);
            $table->string('image');
            $table->string('image_alt');
            $table->string('meta', 255);
            // $table->string('short_description', 500);
            $table->text('short_description');
            $table->text('description');
            $table->boolean('active')->default('0');
            $table->timestamps();
            
            $table->foreign(['user_id'])->references('id')->on('users')->onDelete('cascade');
            $table->foreign(['category_id'])->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
