<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('top_heading');
            $table->string('bottom_heading');
            $table->string('bottom_sub_heading');
            $table->integer('bottom_banner_status')->default(1);
            $table->text('image_path')->nullable();
            $table->string('top_cover_image')->nullable();
            $table->string('bottom_cover_image')->nullable();
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
        Schema::dropIfExists('about_us');
    }
}
