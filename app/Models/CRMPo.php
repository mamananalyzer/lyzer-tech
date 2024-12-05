<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRMPo extends Model
{
    use HasFactory;

    protected $table = 'crm_po';
    protected $primaryKey = 'id_po';
    protected $fillable = [
        'po_number',
        'company',
        'file_po',
        'status',
        'sales',
        'delivery_date',
        'updated_at',
        'created_at'
    ];
}
