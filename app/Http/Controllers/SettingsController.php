<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function viewSetting()
    {
        return view('settings.index');
    }
}
