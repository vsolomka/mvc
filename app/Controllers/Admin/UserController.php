<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Models\Users;
use App\Models\UserPermissions;

class UserController extends Controller
{
    public function process()
    {
        $users = new Users();
        $data["users"] = $users->get();

        $data["permissions"] = $this->getPermissions();

        $this->generate('Admin', 'UserList', $data);
    }

    public function addAction()
    {
        $this->editForm(["id" => 0]);
    }

    public function removeAction()
    {
        $users = new Users();
        $users->remove((int) $_GET["id"]);
        header("Location: /admin/user");
    }

    public function editAction()
    {
        $users = new Users();
        $fields = $users->get((int) $_GET["id"]);
        $this->editForm($fields[0]);
    }

    public function updateAction()
    {
        $id = (int) $_POST["id"];
        $first_name = filter_var($_POST["first_name"], FILTER_SANITIZE_STRING);
        $last_name = filter_var($_POST["last_name"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        $password = trim($_POST["password"]);
        $id_user_permissions = (int) $_POST["id_user_permissions"];
        
        if (empty($first_name) || empty($last_name) || empty($email)) {
            return false;
        }

        $values = [
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "password" => $password,
            "id_user_permissions" => $id_user_permissions,
        ];

        if ($password === "") {
            unset($values["password"]);
        }

        $users = new Users();
        $result = $users->set($values);
 
        if ($result) {
            $values = [
                "message" => "Data was updated successfully",
                "message-type" => "success",
            ];
        } else {
            $values["message"] = "Data was not updated.";
            $values["message-type"] = "failure";
        }
        $this->editForm($values);
    }

    public function editForm($fields = [])
    {
        $this->generate("Admin", "UserForm", ["fields" => $fields, "permissions" => $this->getPermissions()]);
    }

    protected function getPermissions()
    {
        $permissions = new UserPermissions();
        $result = [];
        foreach ($permissions->get() as $row) {
            $result[$row["id"]] = $row["name"];
        }
        return $result;
    }

}