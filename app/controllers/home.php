<?php 

class Home extends Controller{
    
    public function index(){
        $data = [];
        $data['title'] = "Home";
        if(isset($_SESSION['USER_DATA'])){
        $data['displaymessage'] = 'You have already logged in as ' . $_SESSION['type'] . '. <a href="' . ROOT . '/' . $_SESSION['type'] . '_dashboard"> Click here to go to the dashboard.</a>';
        }else{
            $data['displaymessage'] = 'Select the user account type you want to login / register as.';
        }

        $this->view('landing',$data);

    }

    
}