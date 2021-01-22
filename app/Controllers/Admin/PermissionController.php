<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Controllers\Admin\MessageController;
use App\Models\UserPermissions;

class PermissionController extends Controller
{
    public function process()
    {
        $permissions = new UserPermissions();
        $data = $permissions->get();
        $this->generate('Admin', 'PermissionList', $data);
    }

    public function addAction()
    {
        $this->editForm(["id" => 0]);
    }

    public function removeAction()
    {
        $permissions = new UserPermissions();
        $permissions->remove((int) $_GET["id"]);
        header("Location: /admin/permission");
    }

    public function editAction()
    {
        $permissions = new UserPermissions();
        $fields = $permissions->get((int) $_GET["id"]);
        $this->editForm($fields[0]);
    }

    public function updateAction()
    {
        $id = (int) $_POST["id"];
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        
        if (empty($name)) {
            return false;
        }

        $values = [
            "id" => $id,
            "name" => $name,
        ];

        $permissions = new UserPermissions();
        $result = $permissions->set($values);
 
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
        $this->generate("Admin", "PermissionForm", $fields);
    }
}