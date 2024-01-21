<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
// {
    // }
{
    use HasFactory;
    protected $primaryKey = 'id_user';
    protected $table = 'users'; // Make sure the table name is correct
    protected $fillable = ['name', 'email', 'image', 'role_id', 'is_active', 'updated_at', 'created_at'];
}
