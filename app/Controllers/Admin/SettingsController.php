<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Models\UserPermissions;

class SettingsController extends Controller
{
    public function process()
    {
        $obj = new UserPermissions();
        $data = $obj->getPermissions();
        $this->generate('Admin', 'Settings', $data);
    }
}