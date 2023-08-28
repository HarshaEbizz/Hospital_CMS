<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('prefix')->nullable()->default('Dr.');
            $table->string('full_name');
            $table->string('qualification');
            $table->string('speciality_id');
            $table->integer('cluster')->nullable();
            $table->string('language_known');
            $table->integer('department_id');
            $table->string('designation');
            $table->string('mobile_no');
            $table->string('gender');
            $table->string('opd_number')->nullable();
            $table->string('opd_timings_morning')->nullable();
            $table->string('opd_timings_eveining')->nullable();
            $table->string('image_path');
            $table->string('profile_photo');
            $table->longText('experience')->nullable();
            $table->longText('professional_highlight')->nullable();
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
        Schema::dropIfExists('doctor_profiles');
    }
}
