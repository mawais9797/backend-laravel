<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table='admin';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'mem_type',
        'mem_image',
        'mem_email_verified',
        'email_verification_code',
        'code_expiry_time',
    ];
}
