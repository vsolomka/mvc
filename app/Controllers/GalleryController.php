<?php
namespace App\Controllers;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->generate('Home', 'Gallery');
    }
}