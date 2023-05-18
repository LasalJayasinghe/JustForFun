<?php 

class Dashboard extends Controller{
    
    public function index(){

        // $apprej = $_GET['action'];
        $action['value'] = $_GET['action'];
        $action['email'] = $_GET['email'];
        //for accepting and rejecting new admin requests

        $admin = new Admin();
        // if($apprej ='accept'){
        //     $action['value'] = 1;
        // }elseif($apprej ='reject'){
        //     $action['value']  = 2;        
        // }

        $actionquery = "UPDATE System_admin SET approved = :actionvalue WHERE email = :email";

        if($admin->queryin($actionquery, $action)){
            $message = "Successfully ".$action['value']."ed new admin";
        }

        $data['title'] = "dashboard";
        //$this->view('admin/dashboard',$data);

        $data['newadmins'] = $admin->getadmins();
        if($data['newadmins']==null){
            $data['newadmins'] = "None";
        }
        
        $this->view('admin/dashboard',$data);
    }

}

