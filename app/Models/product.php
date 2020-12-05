<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'address',
        'city',
        'rent_cond',
        'rent_availability',
        'maintenance_charge',
        'ownership',
        'locality',
        'possessed_by',
        'price',
        'deposit',
        'available_for',
        'type',
        'product_image',
        'bedc_ount',
        'bathroom',
        'garage',
        'garage_area',
        'balconies',
        'add_rooms',
        'addons',
        'buildyear',
        'amenities',
        'equipment',
        'features',
        'nearby_places',
        'area',
        'description',
        'registration_status',
        'build_name',
    ];

}
