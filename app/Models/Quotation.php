<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $table = 'quotation';
    protected $primaryKey = 'id_quotation';
    protected $fillable = [
        'quotNumber',
        'project',
        'customer',
        'amount',
        'sales',
        'status',
        'paidby',
        'brand',
        'type',
        'detail',
        'price',
        'qty',
        'total',
        'discount',
        'updated_at',
        'created_at'
    ];
}
