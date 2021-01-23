<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;

class IndexController extends Controller
{
    public function process()
    {
        $this->generate('Admin', 'Home');
    }
}