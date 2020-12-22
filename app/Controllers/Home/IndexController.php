<?php
namespace App\Controllers\Home;
use App\Controllers\Controller;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->generate('Home', 'Home');
    }
}