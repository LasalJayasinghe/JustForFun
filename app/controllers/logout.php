<?php 

class Logout extends Controller{
    
    public function index(){
        if($_SESSION['type']=='operator'){
            $operator = new Operator();
            $operator->updateLoggedoutStatus($_SESSION['USER_DATA']['code']);
        }

        Auth::logout();
        redirect('home');
    }
}