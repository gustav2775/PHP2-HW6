<?php

session_start();

include_once "../config/config.php";

include_once "../engine/Autoload.php";

use app\engine\{Autoload,DefaultRender, TwigRender };
use app\engine\Request;
use app\controllers\{AuthController};

spl_autoload_register([new Autoload(), 'loadClass']);

$request= new Request ();

$controllerName = $request->getControllerName() ?: "index";
$controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

$actionName = $request->getActionName()  ?: $controllerName;
$actionMethod = "action" . $actionName;

if (class_exists($controllerClass)) {
    $controllerClass = new $controllerClass(new DefaultRender(),new AuthController());
    if (method_exists($controllerClass, $actionMethod)) {
        $controllerClass->$actionMethod();
    } else {
        die("Такого action не существует");
    }
} else {
    die("Такой страницы не существует");
}

