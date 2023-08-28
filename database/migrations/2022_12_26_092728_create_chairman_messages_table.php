<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChairmanMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chairman_messages', function (Blueprint $table) {
            $table->id();
            $table->string('message_heading');
            $table->string('message_sub_heading');
            $table->longText('message_paragraph_1');
            $table->longText('message_paragraph_2');
            $table->text('image_path')->nullable();
            $table->string('message_person_photo')->nullable();
            $table->string('message_signature_photo')->nullable();
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
        Schema::dropIfExists('chairman_messages');
    }
}
