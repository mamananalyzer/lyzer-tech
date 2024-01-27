<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'id_customer';
    protected $fillable = [
        'name',
        'email',
        'image',
        'area',
        'address',
        'phonenumber',
        'mobilephone',
        'company',
        'position',
        'status',
        'updated_at',
        'created_at',
        // Add more columns as needed
    ];
}
