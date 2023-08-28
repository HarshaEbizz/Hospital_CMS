<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovermentSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goverment_schemes', function (Blueprint $table) {
            $table->id();
            $table->string('scheme_name');
            $table->longText('scheme_note');
            $table->string('scheme_image');
            $table->text('storage_path');
            $table->string('title_1')->nullable();
            $table->string('note_1')->nullable();
            $table->longText('details_1')->nullable();
            $table->string('title_2')->nullable();
            $table->longText('details_2')->nullable();
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
        Schema::dropIfExists('goverment_schemes');
    }
}
