<?php


spl_autoload_register(function ($class){
    require "{$class}.php";
});


class Controller implements GenericController {


    /**
     * function to invoke the controller
     * @author Ahmed Mera
     */
    public function start(): void
    {
        // TODO: Implement start() method.
    }
}