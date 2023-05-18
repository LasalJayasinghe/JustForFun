<?php 

class Vehicles_records extends Controller{
    
    public function index(){

        $data['title'] = "vehicles";
        $vehicles = new Vehicles();

        if(array_key_exists('filter', $_POST)) {
            $data['vehicles'] = $vehicles->findall();
        
        }else{
            $data['vehicles'] = $vehicles->findall();
        }
        
        $this->view('admin/vehicles',$data);
    }

}