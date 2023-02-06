<?php

class Home extends Controller
{
    public function index()
    {   

        // $db = new Database();
        // $res =$db->query("SELECT * FROM org_admin");

        // show($res); 

        // $users = new User();
        // $users-> insert($data); 

        $data['title'] = "Home page";
        $this->view("home", $data);
    }

    
}