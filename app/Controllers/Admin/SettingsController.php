<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->generate('Admin', 'Settings');
    }
}