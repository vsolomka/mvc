<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Controllers\Admin\MessageController;
use App\Models\UserPermissions;

class SettingsController extends Controller
{
    public function process()
    {
        $permissions = new UserPermissions();
        $data = $permissions->get();
        $this->generate('Admin', 'Settings', $data);
    }

    public function addAction()
    {
        $permissions = new UserPermissions();
        $permissions->add($name);
        header("Location: /admin/settings");
    }

    public function removeAction()
    {
        $permissions = new UserPermissions();
        $permissions->remove($id);
        header("Location: /admin/settings");
    }

    public function updateAction()
    {
        $permissions = new UserPermissions();
        $result = $permissions->set();
        $message = new MessageController();
        if ($result) {
            $message->success();
        } else {
            $message->failure();
        }
    }
}