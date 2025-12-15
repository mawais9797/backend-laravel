<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_model extends Model
{
    use HasFactory;
    protected $table='members';
    protected $fillable = [
        'mem_fname',
        'mem_lname',
        'mem_email',
        'mem_password',
        'mem_type',
        'mem_image',
        'mem_email_verified',
        'email_verification_code',
        'code_expiry_time',
    ];
}
