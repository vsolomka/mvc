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

    public function add()
    {
        if (!empty($_POST["name"])) {
            $name = trim((string) $_POST["name"]);
        } else {
            return false;
        }

        $query = $this->insert();
        $query->into("user_permission");
        $query->values(["name" => $name]);
        $query->execute();
    }

    public function remove()
    {
        if (!empty($_GET["id"])) {
            $id = (int) $_GET["id"];
        } else {
            return false;
        }

        $query = $this->delete();
        $query->from("user_permission");
        $query->where(["id" => $id]);
        $query->execute();
    }

    public function set()
    {
        if (!empty($_POST["name"])) {
            $name = trim((string) $_POST["name"]);
        } else {
            return false;
        }

        if (!empty($_POST["id"])) {
            $id = (int) $_POST["id"];
        } else {
            return false;
        }

        $query = $this->update();
        $query->table("user_permission");
        $query->values(["name" => $name]);
        $query->where(["id" => $id]);
        return $query->execute();
    }
}
