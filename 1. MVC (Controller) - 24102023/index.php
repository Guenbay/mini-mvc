<?php

//php.net autoloader
//include ("datei.php");

spl_autoload_register(function ($class) {
    
    $prefix = 'MyApp\\';

    $base_dir = __DIR__ .'/';

    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) 
    {
        return;
    }

    $relative_class = substr($class, $len);
    
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) 
    {
        require $file;
    }
});

//$classname = "MyApp\\Controller\TestDatei";
//$test = new $classname;


//index.php?controller=index&action=index
$controllerName = ucfirst(isset($_GET['controller']) ? $_GET['controller'] : "index");

$actionName = ucfirst(isset($_GET['action']) ? $_GET['action'] : "index");

$controllerClassName = "\\MyApp\\Controller\\".$controllerName."Controller";

$actionMethodName = $actionName."Action";

try {

    $controller = new $controllerClassName();

    if(!class_exists($controllerClassName))
    {
        throw new \Exception("".$controllerClassName."");
    }


    $controller->$actionMethodName();


} catch (\Exception $message) {
    echo $message->getMessage();
}