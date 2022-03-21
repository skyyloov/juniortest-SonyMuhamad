<?php  
ini_set('error_reporting', E_ALL);
ini_set('display_errors','1');
spl_autoload_register(function($classname){
    $file = str_replace('\\', DIRECTORY_SEPARATOR,$classname).'.php'; // Penting ni boss
        require $file;


});
use app\Core\Application;
$app = new Application;

