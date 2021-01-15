<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Models\UserPermissions;

class SettingsController extends Controller
{
    private $permissions;
    public function __construct()
    {
        $this->permissions = new UserPermissions();
    }
    public function process()
    {
        //$obj->updatePermission();
        
        $data = $this->permissions->get();
        $this->generate('Admin', 'Settings', $data);

    }

    public function add(string $name)
    {
        echo "Adding new permissons level: $name";
        if (!empty($name)) {
            $this->permissions->add($name);
        }
    }

    public function remove(int $id)
    {
        echo "Removing permission [id = $id]";
        $this->permissions->remove($id);
    }
}