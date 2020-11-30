<?php


spl_autoload_register(function ($class){
    require "{$class}.php";
});


class Controller implements GenericController {

    private ControllerApp $controllerApp;
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->controllerApp = new ControllerApp();

    }


    /**
     * function to invoke the controller
     * @author Ahmed Mera
     */
    public function start(): void
    {
        $this->controllerApp->start();

    }
}