<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_information', function (Blueprint $table) {
            $table->id();
            $table->string('title_1');
            $table->string('info_type');
            $table->longText('details_1')->nullable();
            $table->text('storage_path');
            $table->string('cover_image')->nullable();
            $table->string('document')->nullable();
            $table->string('title_2')->nullable();
            $table->longText('details_2')->nullable();
            $table->string('title_3')->nullable();
            $table->longText('details_3')->nullable();
            $table->boolean('active')->default(1)->comment('1 = active 0 = deactive');
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
        Schema::dropIfExists('health_information');
    }
}
