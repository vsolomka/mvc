<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Models\Users;

class IndexController extends Controller
{
    public function process()
    {
        $users = new Users();
        $data = $users->get();
        $this->generate('Admin', 'Home', $data);
    }
}