<?php
namespace App\Models;

class About
{
    private $info = [
        "This is MVC project",
        "It is written during the couse \"PHP basics\"",
        "Hillel IT school, Dnipro"
    ];

    public function getInfo()
    {
        return $this->info;
    }
    public function setInfo($value)
    {
        $this->info = $value;
    }
}