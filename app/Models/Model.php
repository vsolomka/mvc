<?php
namespace App\Models;
use Components\Orm\Select;

class Model
{
    protected function select()
    {
        return new Select();
    }
}