<?php
namespace App\Controllers\Home;
use App\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function process()
    {
        $obj = new Gallery();
        $data = $obj->getImages();
        $this->generate('Home', 'Gallery', $data);
    }
}