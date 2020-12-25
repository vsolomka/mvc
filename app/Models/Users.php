<?php
namespace App\Models;

class Users
{
    private $user = [
        "firstName" => "Paul",
        "lastName" => "Mattews",
    ];

    public function getUser()
    {
        return $this->user;
    }
    public function setUser($value)
    {
        $this->user = $value;
    }
}