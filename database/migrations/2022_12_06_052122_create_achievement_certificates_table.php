<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievementCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievement_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_title')->nullable();
            $table->string('image_name')->nullable();
            $table->text('image_path')->nullable();
            $table->longText('detail')->nullable();
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('achievement_certificates');
    }
}
