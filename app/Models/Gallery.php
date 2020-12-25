<?php
namespace App\Models;

class Gallery
{
    private $images = [
        "https://cdn.techterms.com/img/lg/mvc_1321.png",
        "https://cdn-images-1.medium.com/max/2000/1*m94mXVuN3_bvHbrowVwstg.png",
        "http://techgeekbuzz.com/wp-content/uploads/2019/06/MVC-Architecture.png"
    ];

    public function getImages()
    {
        return $this->images;
    }
    public function setImages($value)
    {
        $this->images = $value;
    }
}