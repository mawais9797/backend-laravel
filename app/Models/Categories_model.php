<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories_model extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'image',
        'cat_name',
        'status'
    ];
}
