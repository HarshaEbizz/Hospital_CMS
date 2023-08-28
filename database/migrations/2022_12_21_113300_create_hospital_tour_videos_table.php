<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalTourVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_tour_videos', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('bottom_heading')->nullable();
            $table->text('image_path')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('bottom_cover_image')->nullable();
            $table->longText('object')->nullable();
            $table->longText('bottom_videos_object')->nullable();
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
        Schema::dropIfExists('hospital_tour_videos');
    }
}
