<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientResponsibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_responsibilities', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('title');
            $table->text('image_path')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('image_name')->nullable();
            $table->longText('rights')->nullable();
            $table->longText('responsibilities')->nullable();
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
        Schema::dropIfExists('patient_responsibilities');
    }
}
