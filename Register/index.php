<?php

ob_start();


spl_autoload_register(function ($class){
   if(file_exists(__DIR__."/Controllers/{$class}.php"))
        require_once __DIR__."/Controllers/{$class}.php";
   else
       require_once  __DIR__."/Interfaces/{$class}.php";
});



$controller = new Controller();
$controller->start();







ob_end_flush();