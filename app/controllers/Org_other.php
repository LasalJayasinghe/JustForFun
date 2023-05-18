<?php

class Org_Other extends Controller
{
    
    public function index()
    {  
        $other = new other();
        $brn = Auth::getbrn();

        $machieneno = isset($_GET['search_words']) ? $_GET['search_words'] : null;
        $startAmount = isset($_GET['start_amount']) ? $_GET['start_amount'] : null;
        $endAmount = isset($_GET['end_amount']) ? $_GET['end_amount'] : null;

        $data['posts'] = $other->getmachieneno($machieneno,$startAmount,$endAmount);
        
        
        $data['rows'] = $other->where(['brn' => $brn]);
        
    
        $data['title'] = "Vehicle Details";
        $this->view("Organization/Other", $data);
    }
}
