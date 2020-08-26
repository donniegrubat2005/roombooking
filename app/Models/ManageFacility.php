<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManageFacility extends Model
{
    protected $table = 'manage_facilities';

    protected $fillable = ['facility_title', 'facility_desc', 'facility_image'];
}
