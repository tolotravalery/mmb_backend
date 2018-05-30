<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageGallerieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imageGalleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->string("path");
            $table->integer('galleries_id')->unsigned()->index();
            $table->foreign('galleries_id')->references('id')->on('galleries')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('imageGalleries');
    }
}
