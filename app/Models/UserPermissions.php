<?php
namespace App\Models;

class UserPermissions extends Model
{
    public function getPermissions()
    {
        $data = $this->select();
        $data->from("user_permission");
        return $data->execute();
    }
    
    public function setPermissions($value)
    {
        $this->permissions = $value;
    }
}