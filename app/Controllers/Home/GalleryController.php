<?php
namespace App\Controllers\Home;
use App\Controllers\Controller;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->generate('Home', 'Gallery');
    }
}