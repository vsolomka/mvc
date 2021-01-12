<?php
namespace App\Models;
use Components\Orm\Select;
use Components\Orm\Insert;
use Components\Orm\Delete;
use Components\Orm\Update;

class Model
{
    protected function select()
    {
        return new Select();
    }

    protected function insert()
    {
        return new Insert();
    }

    protected function delete()
    {
        return new Delete();
    }

    protected function update()
    {
        return new Update();
    }
}