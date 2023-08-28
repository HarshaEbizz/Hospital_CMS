<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTieupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tieups', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('tieup_type');
            $table->string('company_logo');
            $table->text('image_path')->nullable();
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
        Schema::dropIfExists('tieups');
    }
}
