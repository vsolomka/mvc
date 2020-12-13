<?php
namespace Core;

class Router
{
    private $prop1 = 16;
    protected $prop2 = 17;
    public $prop3 = 18;

    public function run()
    {
        var_export(get_object_vars($this));
    }
}
