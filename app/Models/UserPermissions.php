<?php
namespace App\Models;

class UserPermissions extends Model
{
    public function get()
    {
        $data = $this->select();
        $data->from("user_permission");
        return $data->execute();
    }

    public function add($name)
    {
        $query = $this->insert();
        $query->into("user_permission");
        $query->values(["name" => $name]);
        $query->execute();
    }

    public function remove($id)
    {
        $query = $this->delete();
        $query->from("user_permission");
        $query->where(["id" => $id]);
        $query->execute();
    }

    public function update()
    {
        $query = $this->update();
        $query->table("user_permission");
        $query->values(["name" => "trainee"]);
        $query->where(["id" => 10]);
        $query->execute();
    }
}
