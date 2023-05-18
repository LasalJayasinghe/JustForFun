<?php
class Stats extends Controller
{

    public function index()
    {
        $data['title'] = "Stats";
        $user = $_SESSION['type'];

        $transaction = new Transaction();
        $fuelstock = new Fuelstock();
        $customer = new Customer();
        $station = new Stations();
        $organization = new Org();
        $vehicle = new Vehicle();
        // $org_vehicle = new Org_Vehicle();

        ///////////////////////////  STATION STATS LOADER  ///////////////////////////
        if ($user == 'station') {

            $station_id = $_SESSION['USER_DATA']['station_id'];

            $data['errors'] = ' ';
            // $data['rows'] =  $transaction->where(['station_id' => $station_id]);


            $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
            $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;
            $user_search = isset($_GET['user_search']) ? $_GET['user_search'] : null;
            $fuel_type = isset($_GET['fuel_type']) ? $_GET['fuel_type'] : null;


            $data['rows'] = $transaction->gettransaction($start_date, $end_date, $user_search,$fuel_type, $station_id);




            $data['restockingpetrol95'] = $fuelstock->getStockData($station_id, 'petrol95');
            $data['restockingpetrol92'] = $fuelstock->getStockData($station_id, 'petrol92');
            $data['restockingautodiesel'] = $fuelstock->getStockData($station_id, 'dieselauto');
            $data['restockingsuperdiesel'] = $fuelstock->getStockData($station_id, 'dieselsuper');

            $data['distributionpetrol95'] = $transaction->getDistributionData($station_id, 'petrol95');
            $data['distributionpetrol92'] = $transaction->getDistributionData($station_id, 'petrol92');
            $data['distributionautodiesel'] = $transaction->getDistributionData($station_id, 'dieselauto');
            $data['distributionsuperdiesel'] = $transaction->getDistributionData($station_id, 'dieselsuper');
            $this->view('stationadmin/stats', $data);

        } elseif ($user == 'admin') {
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

            $this->view('admin/stats', $data);


            ///////////////////////////  CUSTOMER STATS LOADER  ///////////////////////////
        } elseif ($user == 'customer') {
            $this->view('customer/stats', $data);


            ///////////////////////////  ORGANIZATION STATS LOADER  ///////////////////////////
        } elseif ($user == 'org') {
            $this->view('org/stats', $data);
        }
    }
}
