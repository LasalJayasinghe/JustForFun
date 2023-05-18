<?php 

class Quota extends Controller{
    
    public function index(){ 
        $data['title'] = "quota";
        
        $vehicle = new Vehicle();
        $station = new Stations();
        $transaction = new Transaction();
        $customer = new Customer();
        $organization = new Org();
        $weeklyquota = new WeeklyQuota();
        $org_vehicle = new Org_Vehicles();

        $vehicleno = $_SESSION['vehicle'];
        $current_vehicle = [];
/*
        if(array_key_exists('exit',$_POST)){
            unset($_SESSION['vehicle']);
            redirect('scanner');
        }
*/
        if($result = $vehicle->first(['vehicleno'=>$vehicleno])){ //passes data to model, gets result (works)
            $current_vehicle = [
                'vehicleno' => $result['vehicleno'],
                'owner_type' => $result['owner_type'],
                'fuel_type' => $result['fuel'],
                'balance_quota' => '',
                'expiry_date' => ''
            ];
        }else{
            $vehicle->result = "vehicle not found";
            redirect('scanner');
        }

        
        ///////////////// IF THE VEHICLE IS A PRIVATE OWNED //////////////////////
        if($current_vehicle['owner_type'] == 'pvt'){
            if($owner_table_results = $customer->first(['vehicleno' => $vehicleno])){
                $current_vehicle['balance_quota'] = $owner_table_results['balance_quota'];
                // $dateTime = new DateTime($owner_table_results['expiry_date']);
                // $current_vehicle['expiry_date'] = $dateTime->format('Y-m-d');

                if($quota_table_result = $weeklyquota->first(['vehicle_type' => $result['category']])){
                    $current_vehicle['total_quota'] = $quota_table_result['quota'];
                }else{
                    $current_vehicle['total_quota'] = "0";
                }
            }else{
                $current_vehicle = [
                    'owner_type' => $result['org']
                ];
            }
        }

    ///////////////// IF THE VEHICLE IS AN ORGANIZATON OWNED //////////////////////
        if($current_vehicle['owner_type'] == 'org'){
            if($orgVehi_table_results = $org_vehicle->first(['vehicleno' => $vehicleno])){
                if($org_table_results = $organization->first(['brn'=> $orgVehi_table_results['BRN']])){
                }else{
                    echo("organization not found");
                }
                if($current_vehicle['fuel_type'] == 'petrol')
                    $fuel_type = 'petrol';
                else
                    $fuel_type = 'diesel';
                    
                $current_vehicle['total_quota'] = $org_table_results[$fuel_type.'_quota'];
                $current_vehicle['balance_quota'] = $org_table_results[$fuel_type.'_balance'];
                // $dateTime = new DateTime($org_table_results['expiry_date']);
                // $current_vehicle['expiry_date'] = $dateTime->format('Y-m-d');
                $current_vehicle['brn'] = $orgVehi_table_results['BRN'];
            }else{ 
                $current_vehicle = [
                    'owner_type' => $result['pvt']
                ];
            }
        }

        $_SESSION['current_vehicle'] = $data['current_vehicle'] = $current_vehicle;

        $this->view('operator/quota',$data);
    }
    
}