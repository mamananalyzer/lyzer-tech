<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metering_Facility extends Model
{
    use HasFactory;

    protected $table = 'metering_facility';
    protected $primaryKey = 'id_metering_facility';
    protected $fillable = [
        'facility', 'project', 'section', 'device', 'device_name',
    ];

    public $timestamps = true;
}
