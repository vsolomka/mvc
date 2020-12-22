<?php
namespace App\Controllers;

class AdminSettingsController extends Controller
{
    public function __construct()
    {
        $this->generate('Admin', 'Settings');
    }
}