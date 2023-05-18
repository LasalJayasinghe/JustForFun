<?php

class Org_findfuel extends Controller
{
    public function index()
    { 
        $data['title'] = "Home page";
        $this->view("Organization/findfuel", $data);
    }

    
}