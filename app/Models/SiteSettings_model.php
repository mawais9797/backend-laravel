<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettings_model extends Model
{
    use HasFactory;
    protected $table = 'site_settings';
    protected $fillable = [
        'site_name',
        'site_domain',
        'site_email',
        'site_email_noreply',
        'site_phone',
        'site_address',
        'site_about',
        'site_copyright',
        'site_logo',
        'site_favicon',
        'site_thumbnail',
        'site_themecolor',
        'site_facebook',
        'site_instagram',
        'site_twitter',
        'site_youtube',
        'site_meta_desc',
        'site_meta_keyword',
        'site_ft_heading1',
        'site_ft_heading2',
        'site_ft_heading3',
        'site_ft_heading4',
        'site_newsletter_txt',
    ];
}
