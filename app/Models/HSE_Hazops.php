<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HSE_Hazops extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'HSE_Hazops';

    protected $primaryKey = 'id_hazops';

    protected $fillable = ['node', 'deviation', 'cause', 'consequence', 'safeguards', 'actions', 'created_at'];

    protected $dates = ['deleted_at'];

}
