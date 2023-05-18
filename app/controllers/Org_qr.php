<?php

class Org_Qr extends Controller
{
    public function index()
    {   
        $org = new Org();
        $Org_vehicles= new org_vehicles();
        $Vehicles= new Vehicle();

        $brn = Auth::getBRN();
        //fillters
        $vehicleno = isset($_GET['search_words']) ? $_GET['search_words'] : null;
        $data['posts'] = $Org_vehicles->getVehicleno($vehicleno);
        //end of fillters

        $data['org'] = $org->first(['brn' => $brn]);
        $data['rows'] = $Org_vehicles->where(['brn' => $brn]);
        $rows = $data['rows'];

        if(!empty($rows)){
        foreach ($rows as $row) :
            $data['details'] = $Vehicles->first(['vehicleno'=> $row['vehicleno']]);
            $vehicleno = $row['vehicleno'];
            $data[$vehicleno]['chassis_number'] = $data['details']['chassis_number'];
        endforeach; 
     }

        $data['title'] = "QR page";
        $this->view("Organization/qr", $data);

    }
}