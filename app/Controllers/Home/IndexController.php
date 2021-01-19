<?php
namespace App\Controllers\Home;
use App\Controllers\Controller;
use App\Models\Users;

class IndexController extends Controller
{
    public function process()
    {
        $this->generate('Home', 'Home');
    }
}