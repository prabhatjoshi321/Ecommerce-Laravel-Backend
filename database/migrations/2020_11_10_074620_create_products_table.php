<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('rent_cond');
            $table->string('rent_availability');
            $table->string('maintenance_charge');
            $table->string('ownership');
            $table->string('locality');
            $table->string('possessed_by');
            $table->string('price');
            $table->string('deposit');
            $table->string('available_for');
            $table->string('type');
            $table->binary('product_image');
            $table->string('bedc_ount');
            $table->string('bathroom');
            $table->string('garage');
            $table->string('garage_area');
            $table->string('balconies');
            $table->string('add_rooms');
            $table->string('addons');
            $table->string('buildyear');
            $table->string('amenities');
            $table->string('equipment');
            $table->string('features');
            $table->string('nearby_places');
            $table->string('area');
            $table->string('description');
            $table->string('registration_status');
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
        Schema::dropIfExists('products');
    }
}
