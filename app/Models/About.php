<?php
namespace App\Models;

class About
{
    private $test = [1, 3, 12];

    public function getTest()
    {
        return $this->test;
    }
    public function setTest($value)
    {
        $this->test = $value;
    }

}