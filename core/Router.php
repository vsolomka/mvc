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
        $action = "";
        $params = "";
        $controller = "";

        if (isset($this->routingMap[$this->requestPath])) {
            $parts = explode(":", $this->routingMap[$this->requestPath]);
            $classNamespace .= $parts[0];
            if (!empty($parts[1])) {
                $action = $parts[1] . "Action";
            }
        } else {
            $classNamespace .= "Page404";
        }
        $classNamespace .= 'Controller';
        
        $classObj = new $classNamespace();
        
        if (method_exists($classObj, $action)) {
            $classObj->$action($params);
        } else {
            $classObj->process(); // default method
        }
        
    }
}
