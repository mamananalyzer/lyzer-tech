<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;

    protected $table = 'inverter';
    protected $primaryKey = 'id_inverter';
    protected $fillable = [
        'id_cluster',
        'kode_project',
        'sn' ,
        'id_device',
        'inverter_status',
        'daily_energi',
        'cummulative_energi',
        'active_power',
        'reactive_power',
        'inverter_rated_power',
        'power_factor',
        'grid_frequency',
        'phase_a_current',
        'phase_b_current',
        'phase_c_current',
        'phase_a_voltage',
        'phase_b_voltage',
        'phase_c_voltage',
        'inverter_startup_time',
        'inverter_shutdown_time',
        'internal_temperature',
        'pv1_voltage',
        'pv2_voltage',
        'pv3_voltage',
        'pv4_voltage',
        'pv5_voltage',
        'pv6_voltage',
        'pv7_voltage',
        'pv8_voltage',
        'pv1_current',
        'pv2_current',
        'pv3_current',
        'pv4_current',
        'pv5_current',
        'pv6_current',
        'pv7_current',
        'pv8_current',
        'created_at'
    ];
}
