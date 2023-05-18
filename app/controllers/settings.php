<?php 

class Settings extends Controller{
    
    public function index(){ 

        $data['title'] = "settings";
        $this->view('admin/settings',$data);
    }

}