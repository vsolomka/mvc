<?php
namespace App\Controllers\Home;
use App\Controllers\Controller;
use App\Models\Users;

class IndexController extends Controller
{
    public function __construct()
    {
        $obj = new Users();
        $data = $obj->getUser();
        $this->generate('Home', 'Home', $data);
    }
}