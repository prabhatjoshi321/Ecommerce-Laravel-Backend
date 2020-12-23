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
            $table->integer('user_id');
            $table->string('address');
            $table->string('city');
            $table->string('rent_cond');
            $table->string('rent_availability');
            $table->string('sale_availability');
            $table->string('maintenance_charge');
            $table->string('possession_by');
            $table->string('locality');
            $table->boolean('display_address');
            $table->string('ownership');
            $table->string('expected_pricing');
            $table->json('inclusive_pricing_details');
            $table->boolean('tax_govt_charge');
            $table->boolean('price_negotiable');
            $table->boolean('maintenance_charge_status');
            $table->string('maintenance_charge');
            $table->string('maintenance_charge_condition');
            $table->string('deposit');
            $table->string('available_for');
            $table->string('brokerage_charges');
            $table->string('type');
            $table->string('product_image1');
            $table->string('product_image2');
            $table->string('product_image3');
            $table->string('product_image4');
            $table->string('product_image5');
            $table->string('bedroom');
            $table->string('bathroom');
            $table->string('balconies');
            $table->json('additional_rooms');
            $table->string('furnishing_status');
            $table->json('furnishings');
            $table->integer('total_floors');
            $table->integer('property_on_floor');
            $table->string('rera_registration_status');
            $table->json('amenities');
            $table->string('facing_towards');
            $table->longText('description');
            $table->boolean('additional_parking_status');
            $table->integer('parking_covered_count');
            $table->integer('parking_open_count');
            $table->string('availability_condition');
            $table->string('possession_by');
            $table->string('buildyear');
            $table->string('age_of_property');
            $table->string('expected_rent');
            $table->boolean('inc_electricity_and_water_bill');
            $table->string('security_deposit');
            $table->string('duration_of_rent_aggreement');
            $table->string('month_of_notice');
            $table->string('equipment');
            $table->string('features');
            $table->string('nearby_places');
            $table->string('area');
            $table->string('area_unit');
            $table->string('carpet_area');
            $table->longText('property_detail');
            $table->string('build_name');
            $table->string('willing_to rent_out_to');
            $table->string('agreement_type');
            $table->string('nearest_landmark');
            $table->string('map_latitude');
            $table->string('map_longitude');
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
