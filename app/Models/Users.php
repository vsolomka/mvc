<?php
namespace App\Models;

class Users extends Model
{
    public function getUsers()
    {
        $data = $this->select();
        $data->from("users");
        return $data->execute();
    }
    public function setUsers($value)
    {
        $this->user = $value;
    }
}