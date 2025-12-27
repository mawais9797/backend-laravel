<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plans_model extends Model
{
    protected $table = 'plans';
    protected $fillable = [
        'title',
        'price',
        'validity',
        'feature1',
        'feature2',
        'feature3',
        'feature4',
    ];
}
