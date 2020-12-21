<?php
namespace Core;

class View
{
    public static function generate($template, $page, $data = [])
    {
        require './assets/' . $template . '.php';
    }
}