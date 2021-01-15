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

        foreach ($this->routingMap as $route => $route_path) {
            if (preg_match("/" . str_replace("/", '\\/', $route) . "(\[.+\])*/", $this->requestPath, $result)) {
                $params = trim($result[1], "[]");
                $controller = $route_path;
            }
        }

        if (!empty($controller)) {
            $parts = explode(":", $controller);
            $classNamespace .= $parts[0];
            if (!empty($parts[1])) {
                $action = $parts[1];
            }
        } else {
            $classNamespace .= "Page404";
        }
        $classNamespace .= 'Controller';
        
        $classObj = new $classNamespace();
        var_export(compact("classNamespace", "action", "params"));
        
        if (method_exists($classObj, $action)) {
            $classObj->$action($params);
        } else {
            $classObj->process(); // default method
        }
        
    }
}
