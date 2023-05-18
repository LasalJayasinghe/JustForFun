<?php 

class Terms extends Controller{
    
    public function index(){
        $data['title'] = "Terms & Conditions";
        
        $this->view('Terms',$data);

    }

    
}