<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'address',
        'city',
        'rent_cond',
        'rent_availability',
        'sale_availability',
        'maintenance_charge',
        'possession_by',
        'locality',
        'display_address',
        'ownership',
        'expected_pricing',
        'inclusive_pricing_details',
        'tax_govt_charge',
        'price_negotiable',
        'maintenance_charge_status',
        'maintenance_charge',
        'maintenance_charge_condition',
        'deposit',
        'available_for',
        'brokerage_charges',
        'type',
        'product_image1',
        'product_image2',
        'product_image3',
        'product_image4',
        'product_image5',
        'bedroom',
        'bathroom',
        'balconies',
        'additional_rooms',
        'furnishing_status',
        'furnishings',
        'total_floors',
        'property_on_floor',
        'rera_registration_status',
        'amenities',
        'facing_towards',
        'description',
        'additional_parking_status',
        'parking_covered_count',
        'parking_open_count',
        'availability_condition',
        'buildyear',
        'age_of_property',
        'expected_rent',
        'inc_electricity_and_water_bill',
        'security_deposit',
        'duration_of_rent_aggreement',
        'month_of_notice',
        'equipment',
        'features',
        'nearby_places',
        'area',
        'area_unit',
        'carpet_area',
        'property_detail',
        'build_name',
        'willing_to_rent_out_to',
        'agreement_type',
        'nearest_landmark',
        'map_latitude',
        'map_longitude',
    ];

    public function productid()
    {

        return $this->hasMany('App\Models\product', 'id');
    }

    public function roles()
    {

    }

}
