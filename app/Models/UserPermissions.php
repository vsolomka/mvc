<?php
namespace App\Models;

class UserPermissions extends Model
{
    public function get(int $id = 0)
    {
        $data = $this->select();
        $data->from("user_permission");
        if ($id > 0) {
            $data->where(["id" => $id]);
        }

        return $data->execute();
    }

    public function remove(int $id)
    {
        $query = $this->delete();
        $query->from("user_permission");
        $query->where(["id" => $id]);
        
        return $query->execute();
    }

    public function set($values)
    {
        extract($values);
        unset($values["id"]);

        if ($id === 0) {
            $query = $this->insert();
            $query->into("user_permission");
        } else {
            $query = $this->update();
            $query->table("user_permission");
            $query->where(["id" => $id]);
        }

        $query->values($values);
        return $query->execute();
    }
}
