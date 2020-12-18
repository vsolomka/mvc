<?php
namespace Core;

class Router
{
    private $routingMap;
    private $requestPath;

    public function __construct()
    {
        $this->routingMap = include_once("../app/config/routingMap.php");
        $this->requestPath = $_SERVER["PATH_INFO"] ?? "/";
    }

    public function run()
    {
        $classNamespace = '\\App\\Controllers\\';
        if (isset($this->routingMap[$this->requestPath])) {
            $classNamespace .= $this->routingMap[$this->requestPath];
        } else {
            $classNamespace .= "Page404";
        }
        $classNamespace .= 'Controller';
        
        $classObj = new $classNamespace();
    }
}
