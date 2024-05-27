<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belanja extends Model
{
    use HasFactory;

    protected $table = 'belanja';

    protected $fillable = ['jenisBelanja', 'keteranganBarang', 'totalBelanja', 'created_at'];

}
