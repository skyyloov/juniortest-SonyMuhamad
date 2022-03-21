<?php 

// ====================== this class is the configuration of routing any controllers and any method =========//

// ===== i dont use any parameter for handling product list also endpoints but i still put function for handling parameters to this program ======= // 

namespace App\Core;

class Application {

    protected $controller = 'Product'; // default controller
    protected $method = 'indexProduct'; // default method
    protected $params = []; // paramsss
    protected $instanceClass;
    protected $url;

    public function __construct(){

        // controller
        $this->url = $this->parseUrl();
        
        if ($this->url === []) {
            $this->url[] = '';
        }
        
        if (file_exists('app/controllers/'.$this->url[0].'.php')) 
        {
            $this->controller = $this->url[0];
            unset($this->url[0]);
            
        }
        $this->instanceClass = "app\\Controllers\\".$this->controller;

        $this->controller = new $this->instanceClass;

        //method
        if (isset($this->url[1])) {
            if (method_exists($this->controller,$this->url[1])) {
                $this->method = $this->url[1];
                unset($this->url[1]);
            }
        }

        $this->params = array_values($this->url);
        
        call_user_func_array([$this->controller,$this->method],$this->params);

    }

    public function parseUrl(){

        //method for routing
    if(isset($_GET['url'])){
    $this->url = rtrim($_GET['url'],'/');
    $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
    $this->url = explode('/', $this->url);
    }else{
        $this->url = [];
    }

    return $this->url;
    }


}