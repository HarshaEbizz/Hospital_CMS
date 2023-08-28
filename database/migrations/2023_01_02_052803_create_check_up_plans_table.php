<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckUpPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_up_plans', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('price');
            $table->text('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->string('test_type');
            $table->longText('sub_test_type')->nullable();
            $table->integer('is_show')->default(1);
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
        Schema::dropIfExists('check_up_plans');
    }
}
