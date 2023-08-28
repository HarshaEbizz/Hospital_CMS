<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialitiesTabContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialities_tab_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('specialities_id');
            $table->integer('topic_id');
            $table->string('tab_content_type');
            $table->string('split_content')->nullable();
            $table->string('tab_title')->nullable();
            $table->longText('sub_title')->nullable();
            $table->longText('question')->nullable();
            $table->longText('tab_details')->nullable();
            $table->string('direction')->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->longText('video_url')->nullable();
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('specialities_tab_contents');
    }
}
