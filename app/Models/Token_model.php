<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token_model extends Model
{
    use HasFactory;
    protected $table='tbl_tokens';
    protected $fillable = [
        'mem_id',
        'mem_type',
        'token',
        'expiry_date'
    ];
}
