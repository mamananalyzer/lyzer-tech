<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRM extends Model
{
    protected $table = 'examples';

    protected $fillable = [
        'column1',
        'column2',
        // Add more columns as needed
    ];
}
