<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_title');
            $table->string('event_type');
            $table->text('storage_path')->nullable();
            $table->string('event_banner')->nullable();
            $table->longText('form_field')->nullable();
            $table->longText('description')->nullable();
            $table->string('document')->nullable();
            $table->string('mobile_no')->nullable();
            $table->text('url')->nullable();
            $table->integer('order')->default('0');
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
        Schema::dropIfExists('events');
    }
}
