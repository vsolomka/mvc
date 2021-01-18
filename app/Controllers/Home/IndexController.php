<?php
namespace App\Controllers\Home;
use App\Controllers\Controller;
use App\Models\Users;

class IndexController extends Controller
{
    public function process()
    {
        $obj = new Users();
        $data = $obj->getUsers();
        $this->generate('Home', 'Home', $data);
    }
}