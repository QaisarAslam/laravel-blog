<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->id(); // Ep_36(02:00)
            // We will Differentiate based on their Section names Ep_36(04:00)
            $table->string('section_name', 255)->nullable();
            $table->string('about_heading', 255)->nullable();
            $table->string('about_short_description', 255)->nullable();
            $table->text('about_description')->nullable();
            $table->string('contact_heading', 255)->nullable();
            $table->string('contact_short_description', 255)->nullable();
            $table->text('contact_description')->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->text('instagram', 255)->nullable();
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
        Schema::dropIfExists('cms');
    }
}
