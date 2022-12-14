<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id'); /*Should be Singular*/
            $table->unsignedBigInteger('tag_id'); /*Should be Singular*/
            $table->timestamps();
            
            /*To create relationship*/
            $table->foreign(['blog_id'])->references('id')->on('blogs' /*table name*/)->onDelete('cascade');
            $table->foreign(['tag_id'])->references('id')->on('tags' /*table name*/)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_tag');
    }
}
