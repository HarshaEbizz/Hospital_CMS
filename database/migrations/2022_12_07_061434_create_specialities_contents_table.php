<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialitiesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialities_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('specialities_id');
            $table->string('content_type');
            $table->string('title')->nullable();
            $table->longText('details')->nullable();
            $table->string('direction')->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->longText('video_url')->nullable();
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
        Schema::dropIfExists('specialities_contents');
    }
}
