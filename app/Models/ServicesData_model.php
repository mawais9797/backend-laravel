<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesData_model extends Model
{
    protected $table = 'services_data';
    protected $fillable = [
        'mem_id',
        'cat_id',
        'sub_cat_id',
    ];

    public function category_row()
    {
        return $this->belongsTo(Categories_model::class, 'cat_id', 'id');
    }

    public function sub_category_row()
    {
        return $this->belongsTo(SubCategories_model::class, 'sub_cat_id', 'id');
    }
}