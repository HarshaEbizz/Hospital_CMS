<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthInformationContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_information_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('health_information_id');
            $table->string('title_2')->nullable();
            $table->string('sub_title_2')->nullable();
            $table->longText('details_2')->nullable();
            $table->string('title_3')->nullable();
            $table->string('sub_title_3')->nullable();
            $table->longText('details_3')->nullable();
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
        Schema::dropIfExists('health_information_contents');
    }
}
