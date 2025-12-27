<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_model extends Model
{
    use HasFactory;
    protected $table = 'members';
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

    public function professional_details()
    {
        return $this->hasOne(ProfessionalData_model::class, 'mem_id', 'id');
        // return $this->belongsTo(ProfessionalData_model::class, 'mem_id', 'id');
    }
}