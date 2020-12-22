<?php
namespace App\Controllers;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->generate('Admin', 'Home');
    }
}