<?php 

// ================= this class is the configuration to set model and view of this programm.. ==============//

namespace App\Core;
use app\Config\Config;
class Controller extends Config{
    public $configBaseUrl;
    protected $configuration;
    protected $view; 
    protected $controllerModel; 
    protected $instanceClass;
    protected function __construct()
    {
        $this->configuration = new Config;
        $this->configBaseUrl = $this->configuration->{"BASEURL"};
    }
    public function view($view ,$data = []){
        $this->view = $view;
        require_once 'app/views/'.$this->view . '.php';
    }

    public function model($model){

        $this->controllerModel = $model;
        
        $this->instanceClass = "app\\Models\\".$this->controllerModel;
        
        return new $this->instanceClass;
    }

}
