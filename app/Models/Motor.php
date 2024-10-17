<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'motor';

    protected $primaryKey = 'id_motor';

    protected $fillable = [
        'namaMotor',
        'id_user',
        'typeService',
        'komponenBeli',
        'totalBelanja',
        'image',
        'serviceDate',
    ];
    
    protected $dates = ['deleted_at'];
}
