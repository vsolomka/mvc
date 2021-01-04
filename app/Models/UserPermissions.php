<?php
namespace App\Models;
use Components\Orm\Select;

class UserPermissions
{
    public function getPermissions()
    {
        $data = new Select();
        $data->from("user_permission");
        $data->columns(["n" => "name", "user_permission.updated_at"]);
        $data->orderBy(["desc" => "name"]);
        $data->groupBy(["name"]);
        $data->limit(2);
        $data->offset(2);
        $data->join([
            "type" => "cross", 
            "table" => "users", 
            "on" => "id_user_permissions = user_permission.id"
        ]);
        return $data->execute();
    }
    
    public function setPermissions($value)
    {
        $this->permissions = $value;
    }
}