<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;

class MessageController extends Controller
{
    public function success(string $details = "")
    {
        $data = [
            "message" => "Congratulations! The data was updated successfully.",
            "details" => $details,
        ];
        $this->generate("Admin", "Message", $data);
    }

    public function failure(string $details = "")
    {
        $data = [
            "message" => "Error. The data was not updated for some reason.",
            "details" => $details,
        ];
        $this->generate("Admin", "Message", $data);
    }

}