<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->longText('message');
            $table->longText('expertise');
            $table->longText('professional_highlights');
            $table->text('image_path')->nullable();
            $table->string('image_name')->nullable();
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
        Schema::dropIfExists('management_messages');
    }
}
