<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Models\UserPermissions;

class SettingsController extends Controller
{
    public function process()
    {
        $permissions = new UserPermissions();
        //$permissions->updatePermission();
        
        $data = $permissions->get();
        $this->generate('Admin', 'Settings', $data);

    }

    public function add(string $name)
    {
        $permissions = new UserPermissions();
        echo "Adding new permissons level: $name";
        if (!empty($name)) {
            $permissions->add($name);
        }
    }

    public function remove(int $id)
    {
        $permissions = new UserPermissions();
        echo "Removing permission [id = $id]";
        $permissions->remove($id);
    }
}