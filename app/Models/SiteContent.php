<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
   protected $table = 'sitecontent';
   protected $fillable = [
        'ckey',
        'code',
   ];
}
