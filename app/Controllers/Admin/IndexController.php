<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->generate('Admin', 'Home');
    }
}