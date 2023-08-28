<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsContainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us_contains', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('phone_number');
            $table->string('opening_timing');
            $table->timestamps();
        });

        DB::table('contact_us_contains')->insert(
            array(
                'address' => 'Nr Sumul Dairy, Katargam, Surat-395004, Gujarat, India.',
                'phone_number' => '+91-261-7161111',
                'opening_timing' => '24'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_us_contains');
    }
}
