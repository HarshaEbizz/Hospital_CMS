<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('feedback_type');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('speciality_id');
            $table->string('rating')->nullable();
            $table->string('video_id')->nullable();
            $table->string('thumb_image')->nullable();
            $table->string('video_url')->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->text('message')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('patient_reviews');
    }
}
