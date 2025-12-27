<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonials_model extends Model
{
    protected $table = 'testimonials';
    protected $fillable = [
        'name',
        'designation',
        'image',
        'message',
        'status'
    ];
}
