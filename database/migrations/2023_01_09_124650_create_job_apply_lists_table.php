<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplyListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_apply_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id');
            $table->string('application_type');
            $table->string('full_name');
            $table->date('date');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('email');
            $table->text('address');
            $table->string('country_code');
            $table->string('contact');
            $table->string('file_path');
            $table->string('resume_file');
            $table->string('job_position');
            $table->string('qualification');
            $table->string('experience_year');
            $table->string('last_organization');
            $table->string('last_ctc');
            $table->string('last_designation');
            $table->string('information')->nullable();
            $table->integer('status')->default('0')->comment('pending=0,accept=1,decline=2');
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
        Schema::dropIfExists('job_apply_lists');
    }
}
