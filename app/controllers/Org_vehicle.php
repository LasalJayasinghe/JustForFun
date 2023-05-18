<?php

class Org_vehicle extends Controller
{
    
    public function index()
    {  
        $org_vehicles= new org_vehicles();
        $vehicles = new Vehicle();
        $brn = Auth::getbrn();

        $vehicleno = isset($_GET['search_words']) ? $_GET['search_words'] : null;
        $startAmount = isset($_GET['start_amount']) ? $_GET['start_amount'] : null;
        $endAmount = isset($_GET['end_amount']) ? $_GET['end_amount'] : null;

        $data['posts'] = $org_vehicles->getVehicleno($vehicleno,$startAmount,$endAmount);
        
        
        $data['rows'] = $org_vehicles->where(['brn' => $brn]);

        $rows = $data['rows'];
        if(!empty($rows))
        {foreach ($rows as $row) :
            $data['details'] = $vehicles->first(['vehicleno'=> $row['vehicleno']]);
            $vehicleno = $row['vehicleno'];
            $data[$vehicleno]['category'] = $data['details']['category'];
            $data[$vehicleno]['fuel'] = $data['details']['fuel'];
            
        endforeach;
    }
        $data['title'] = "Vehicle Details";
        $this->view("Organization/Vehicle", $data);
    }
}
