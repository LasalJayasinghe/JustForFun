<?php 

class Scanner extends Controller{
    
    public function index(){
        $data['title'] = "Scanner";
        $this->view('operator/scanner',$data);
    }

}