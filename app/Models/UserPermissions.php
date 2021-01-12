<?php
namespace App\Models;

class UserPermissions extends Model
{
    public function getPermissions()
    {
        $data = $this->select();
        $data->from("user_permission");
        $data->where(["name" => "developer"]);
        return $data->execute();
    }

    public function setPermissions($value)
    {
        $this->permissions = $value;
    }

    public function addPermission()
    {
        $query = $this->insert();
        $query->into("user_permission");
        $query->values(["name" => "test"]);
        $query->execute();
    }

    public function removePermission()
    {
        $query = $this->delete();
        $query->from("user_permission");
        $query->where(["name" => "developer", "id" => 9]);
        $query->execute();
    }

    public function updatePermission()
    {
        $query = $this->update();
        $query->table("user_permission");
        $query->values(["name" => "trainee"]);
        $query->where(["id" => 10]);
        $query->execute();
    }
}
