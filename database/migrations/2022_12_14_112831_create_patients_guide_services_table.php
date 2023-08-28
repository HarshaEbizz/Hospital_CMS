<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsGuideServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients_guide_services', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('contact_no')->nullable();
            $table->text('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->string('cover_image')->nullable();
            $table->longText('description')->nullable();
            $table->string('sub_title')->nullable();
            $table->longText('details')->nullable();
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
        Schema::dropIfExists('patients_guide_services');
    }
}
