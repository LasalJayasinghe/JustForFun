<?php 

class Cus_logout extends Controller{
    
    public function index(){
        Auth::logout();
        redirect('home');
    }
}