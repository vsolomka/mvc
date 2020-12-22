<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;

class ActionsController extends Controller
{
    public function __construct()
    {
        $this->generate('Admin', 'Actions');
    }
}