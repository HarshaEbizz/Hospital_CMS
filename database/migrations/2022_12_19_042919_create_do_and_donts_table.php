<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoAndDontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('do_and_donts', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('title');
            $table->text('image_path')->nullable();
            $table->string('cover_image')->nullable();
            $table->longText('do')->nullable();
            $table->longText('donts')->nullable();
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
        Schema::dropIfExists('do_and_donts');
    }
}
