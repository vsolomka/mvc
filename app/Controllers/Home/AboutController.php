<?php
namespace App\Controllers\Home;
use App\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    public function __construct()
    {
        $obj = new About();
        $data = $obj->getTest();

        $this->generate('Home', 'About', $data);
    }
}