<?php

class Org_transactions extends Controller
{
    
    public function index()
    {  
        $transaction= new Transaction();
        $brn = Auth::getBRN();

        $data['rows'] = $transaction->where(['brn' => $brn]);
    
        //filters
        $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
        $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;
        $search_words = isset($_GET['search_words']) ? $_GET['search_words'] : null;

        $data['posts'] = $transaction->getVehicleno($search_words, $start_date , $end_date);
        //end fillters
        
        $data['title'] = "Transaction Details";
        $this->view("Organization/transactions", $data);
    }

    
}