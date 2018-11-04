<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinyimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinyimages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('media_id');
            $table->string('link');
            $table->string('location');
            $table->string('standard_url');
            $table->string('thumb_url');
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
        Schema::dropIfExists('tinyimages');
    }
}
