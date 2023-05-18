<?php

// admin class

class Admin extends Controller{
    
    public function index(){
        $data['title'] = 'Admin';

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;

        $this->view('admin/dashboard', $data);
    }

    public function customers(){

        $data['title'] = 'customers_view';
        $this->view('admin/customers', $data);
    }

    
}