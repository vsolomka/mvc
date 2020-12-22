<?php
namespace App\Controllers;

class AdminActionsController extends Controller
{
    public function __construct()
    {
        $this->generate('Admin', 'Actions');
    }
}