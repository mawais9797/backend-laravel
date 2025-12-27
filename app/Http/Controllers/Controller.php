<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings_model;

abstract class Controller
{
    public function __construct()
    {

        $this->data['site_settings'] = $this->getSiteSettings();
        $this->data['enable_editor'] = false;
        $this->data['all_pages'] = get_pages();
    }

    public function getSiteSettings()
    {
        return SiteSettings_model::where('id', '=', 1)->first();
    }
}
