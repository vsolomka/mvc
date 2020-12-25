<?php
namespace App\Models;

class UserPermissions
{
    private $permissions = [
        "read" => true,
        "update" => false,
        "insert" => true,
    ];

    public function getPermissions()
    {
        return $this->permissions;
    }
    public function setPermissions($value)
    {
        $this->permissions = $value;
    }
}