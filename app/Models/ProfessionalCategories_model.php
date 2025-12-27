<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalCategories_model extends Model
{
    protected $table = 'pro_categories';
    protected $fillable = [
        'mem_id',
        'cat_id'
    ];

    public function category()
    {
        return $this->belongsTo(Categories_model::class, 'cat_id', 'id');
    }

    // Relationship to subcategories
    public function sub_categories()
    {
        return $this->hasMany(ServicesData_model::class, 'cat_id', 'cat_id');
    }
}