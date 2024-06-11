<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Labs_Label extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Labs_Label';

    protected $primaryKey = 'id_label';

    protected $fillable = [
        'brand', 'customer', 'PO', 'type', 'qty', 'scale', 'input'
    ];
    
    protected $dates = ['deleted_at'];
}
