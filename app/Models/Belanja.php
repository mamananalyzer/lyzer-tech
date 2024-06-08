<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Belanja extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'belanja';

    protected $primaryKey = 'id_product';

    protected $fillable = ['jenisBelanja', 'keteranganBarang', 'totalBelanja', 'created_at'];

    protected $dates = ['deleted_at'];

}
