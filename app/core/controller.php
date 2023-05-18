<?php

// main class controller

class Controller{

    public function view($viewfile,$data=[]){ //sends data to the view file (*.views.php)

        extract($data);
        
        $filename = '../app/views/'.$viewfile.'.view.php';
        if(file_exists($filename)){
            require $filename;
        }else{
            echo "View file does not exist ".$filename;
        }
    }//search for the view file and load it
}
