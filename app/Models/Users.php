<?php
namespace App\Models;

class Users extends Model
{
    public function get(int $id = 0)
    {
        $data = $this->select();
        $data->from("users");
        if ($id > 0) {
            $data->where(["id" => $id]);
        }

        return $data->execute();
    }

    public function remove(int $id)
    {
        $query = $this->delete();
        $query->from("users");
        $query->where(["id" => $id]);

        return $query->execute();
    }

    public function set($values)
    {
        extract($values);
        unset($values["id"]);

        if ($id === 0) {
            $query = $this->insert();
            $query->into("users");
        } else {
            $query = $this->update();
            $query->table("users");
            $query->where(["id" => $id]);
        }

        $query->values($values);
        return $query->execute();
    }
}