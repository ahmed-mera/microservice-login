<?php

ob_start();


spl_autoload_register(function ($class){

   if(file_exists(__DIR__."/Controllers/{$class}.php"))
        require_once __DIR__."/Controllers/{$class}.php";

   else if(file_exists( __DIR__."/Interfaces/{$class}.php"))
       require_once  __DIR__."/Interfaces/{$class}.php";

   else if(file_exists(  __DIR__."/Models/{$class}.php"))
       require_once  __DIR__."/Models/{$class}.php";

});



$controller = new Controller();
$controller->start();







ob_end_flush();