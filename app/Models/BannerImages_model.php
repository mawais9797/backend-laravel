<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerImages_model extends Model
{
    protected $table = 'banner_images';
    protected $fillable = [
        'image',
        'status'
    ];
}
