<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medics', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('image_path')->nullable();
            $table->string('cover_image');
            $table->string('title_1');
            $table->string('image_1');
            $table->longText('description_1');
            $table->string('title_2');
            $table->string('image_2');
            $table->longText('description_2');
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
        Schema::dropIfExists('medics');
    }
}
