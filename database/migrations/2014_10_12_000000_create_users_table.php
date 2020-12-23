<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('usertype');
            $table->string('profile_pic');
            $table->string('company_name');
            $table->string('company_url');
            $table->string('address');
            $table->string('city');
            $table->string('other_mobile_number');
            $table->string('landline_number');
            $table->longText('company_profile');
            $table->string('pan_number');
            $table->string('aadhar_number');
            $table->string('provided_service');
            $table->string('place_of_practice');
            $table->string('price_for_service');
            $table->string('law_firm_number');
            $table->string('practice_number');
            $table->boolean('blocked');
            $table->boolean('phone_number_verification_status');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
