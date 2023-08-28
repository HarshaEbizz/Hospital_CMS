<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChairmanSpeaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chairman_speaks', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('sub_heading');
            $table->longText('paragraph_1');
            $table->longText('paragraph_2');
            $table->longText('paragraph_3');
            $table->text('image_path')->nullable();
            $table->string('person_photo')->nullable();
            $table->string('signature_photo')->nullable();
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
        Schema::dropIfExists('chairman_speaks');
    }
}
