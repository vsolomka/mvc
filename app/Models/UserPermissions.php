<?php
namespace App\Models;
use Components\Orm\Select;

class UserPermissions
{
    private $permissions = [
        "read" => true,
        "update" => false,
        "insert" => true,
    ];

    public function getPermissions()
    {
        $data = new Select();
        $data->from("user_permission");
        $data->columns("*");
        return $data->execute();
        // return $this->permissions;
    }
    public function setPermissions($value)
    {
        $this->permissions = $value;
    }
}