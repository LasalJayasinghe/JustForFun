<?php

class Controller 
{
    public function view($view,$data = [])
    {
        $filename = "../app/views/" .$view.".view.php";
        if(file_exists($filename))
        {
            require $filename;
        }else{
            echo  "could not find the view file" .$filename;
        }
    }
}
   