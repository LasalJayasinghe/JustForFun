<?php

class admin_Dashboard extends Controller {
    
    public function index() {
        $data['title'] = "Dashboard";

        $transaction = new Transaction();
        $fuelstock = new Fuelstock();
        $customer = new Customer();
        $station = new Stations();
        $organization = new Org();
        $vehicle = new Vehicle();
        
        $weeklyQuotaModel = new WeeklyQuota();
        $fuelPriceModel = new FuelPrice();

        $data['weeklyQuotas'] = $weeklyQuotaModel->findAll();
        $data['fuelPrices'] = $fuelPriceModel->findAll();

        $data['userbasecount']['active']['station'] = $station->count('station');
            $data['userbasecount']['active']['customer'] = $customer->count('Owners');
            $data['userbasecount']['active']['org'] = $organization->count('org');
            $data['userbasecount']['active']['vehicles'] = $vehicle->count('vehicles', 'use_status');

            $data['userbasecount']['all']['station'] = $station->getRegistered('station');
            $data['userbasecount']['all']['customer'] = $customer->getRegistered('Owners');
            $data['userbasecount']['all']['org'] = $organization->getRegistered('org');
            $data['userbasecount']['all']['vehicles'] = $vehicle->getRegistered('vehicles');

            $pvtData = $vehicle->getCategoryCount('pvt');
            $orgData = $vehicle->getCategoryCount('org');

            $data['labels'] = ['car', 'van', 'tipper', 'lorry', 'motorbike', 'agricultural', 'quadricycle'];

            // Function to find a category in an array and return its count

            $data['categoriesandcounts'] = [];

            foreach ($data['labels'] as $label) {
                $pvtCount = $vehicle->getCount($pvtData, $label);
                $orgCount = $vehicle->getCount($orgData, $label);

                array_push($data['categoriesandcounts'], [
                    'category' => $label,
                    'pvt' => $pvtCount,
                    'org' => $orgCount,
                ]);
            }

        //get the total vehicle counts of each organization
        $data['orgdetails'] = $organization->getOrgDetails();


        $this->view('admin/admindashboard', $data);
    }

    public function updateQuota() {
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['vehicle_type'];
        $newQuota = $input['quota'];

        error_log('Received data for updatequota: ' . print_r($input, true));
    
        $weeklyQuotaModel = new WeeklyQuota();
        $weeklyQuotaModel->updateQuota($id, $newQuota); 
    
        http_response_code(200);
    }
    
    public function updatePrice() {
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['fuel_type'];
        $newPrice = $input['price'];

        error_log('Received data for updatePrice: ' . print_r($input, true));
    
        $fuelPriceModel = new FuelPrice();
        $fuelPriceModel->updatePrice($id, $newPrice);
    
        http_response_code(200);
    }

}
