<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;

class ActionsController extends Controller
{
    public function process()
    {
        $this->generate('Admin', 'Actions');
    }
}