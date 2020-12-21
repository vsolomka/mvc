<?php
namespace App\Controllers;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->generate('Home', 'Home');
    }
}