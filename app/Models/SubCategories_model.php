<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategories_model extends Model
{
    protected $table = "sub_categories";
    protected $fillable = [
        'parent_cat_id',
        'image',
        'name',
        'status',
    ];
}
