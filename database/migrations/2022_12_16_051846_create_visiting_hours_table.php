<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitingHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visiting_hours', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('title');
            $table->string('morning_timing');
            $table->string('eveining_timimg');
            $table->text('note')->nullable();
            $table->text('image_path')->nullable();
            $table->string('cover_image')->nullable();
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
        Schema::dropIfExists('visiting_hours');
    }
}
