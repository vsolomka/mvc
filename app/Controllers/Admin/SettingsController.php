<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Models\UserPermissions;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->generate('Admin', 'Settings', (new UserPermissions())->getPermissions());
    }
}