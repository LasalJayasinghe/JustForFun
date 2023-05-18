<?php

class Org_logout extends Controller
{
    public function index()
    {   
        Auth::logout();
        redirect('home');
    }

    
}