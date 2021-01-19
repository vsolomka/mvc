<?php
namespace App\Models;

class Users extends Model
{
    public function get()
    {
        $data = $this->select();
        $data->from("users");
        return $data->execute();
    }

    public function set($value)
    {
        
    }
}