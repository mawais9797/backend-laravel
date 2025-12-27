<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalData_model extends Model
{
    protected $table = 'professional_data';
    protected $fillable = [
        'mem_id',
        'business_name',
        'business_address',
        'business_type',
        'employees',
        'looking_for',
        'payment_gateway',
    ];

}
