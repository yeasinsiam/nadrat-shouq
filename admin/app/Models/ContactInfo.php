<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'contact_info';

    protected $fillable = [
        'phone_number',
        'email',
        'address',
        'google_map_location_embedded_url',
    ];
}
