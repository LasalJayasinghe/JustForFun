<?php

class App{
    protected $controller = '_404';
    protected $method = 'index';

    function __construct(){ //this function will run automatically when the class is called. if any value is passed in App(), it can be captured here
        $arr = $this->getURL();

        $file = '../app/controllers/'.ucfirst($arr[0]).'.php'; //uppercasefirst
        if(file_exists($file)){
            require $file; //include will ignore if file is not found, which is why we use require
            $this->controller = $arr[0];
            unset($arr[0]);
        }else{
            require '../app/controllers/_404.php';
        }

        $mycontroller = new $this->controller();
        $mymethod = $arr[1] ?? $this->method;

        if(!empty($arr[1])){
            if(method_exists($mycontroller, strtolower($mymethod))){
                $this->method = strtolower($mymethod);
                unset($arr[1]);
            }
        }
        //show($arr);
        $arr = array_values($arr);
        call_user_func_array([$mycontroller, $this->method], $arr); //call_user_func_array() calls a callback with an array of parameters
    }
    
    private function getURL(){
        $url = $_GET['url'] ?? 'home';
        $url = filter_var($url, FILTER_SANITIZE_URL); //Removes all illegal characters from a url
        $arr = explode('/', $url);
        return $arr;
    }
}
