<?php

class Fuelrestock extends Controller
{

   public function index()
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('login?usertype=station');
      }

      $fuelstock = new Fuelstock();
      $stations = new Stations();
      $data['station_id'] = Auth::getStation_id();
      $station_id = Auth::getStation_id();

      // Fetch filter inputs
      $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
      $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;
      $fuel_search = isset($_GET['fuel_search']) ? $_GET['fuel_search'] : null;

      // Pass the filter inputs to the model method
      $data['rows'] = $fuelstock->getFuelStock($start_date, $end_date, $fuel_search, $data['station_id']);

      $data['title'] = "Fuel Stock";

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {


         $data['row'] = $stations->first(['station_id' => $data['station_id']]);

         $available_Petrol92 = $data['row']['petrol92_tank'] - $data['row']['petrol92_bal'];
         $available_Petrol95 = $data['row']['petrol95_tank'] - $data['row']['petrol95_bal'];
         $available_Diesel = $data['row']['dieselauto_tank'] - $data['row']['dieselauto_bal'];
         $available_Superdiesel = $data['row']['dieselsuper_tank'] - $data['row']['dieselsuper_bal'];

         //check validations
         if ($result = $fuelstock->validate($_POST)) {


            if ($_POST['fuel_type'] == 'Petrol92') {
               if ($_POST['fuel_amount'] > $available_Petrol92 || $_POST['fuel_amount'] > $data['row']['petrol92_tank']) {
                  $fuelstock->errors['fuel_amount'] = "Tank capacity is not enough";
               }
            }
            if ($_POST['fuel_type'] == 'Petrol95') {
               if ($_POST['fuel_amount'] > $available_Petrol95 || $_POST['fuel_amount'] > $data['row']['petrol95_tank']) {
                  $fuelstock->errors['fuel_amount'] = "Tank capacity is not enough";
               }
            }
            if ($_POST['fuel_type'] == 'dieselauto') {
               if ($_POST['fuel_amount'] > $available_Diesel || $_POST['fuel_amount'] > $data['row']['dieselauto_tank']) {
                  $fuelstock->errors['fuel_amount'] = "Tank capacity is not enough";
               }
            }
            if ($_POST['fuel_type'] == 'dieselsuper') {
               if ($_POST['fuel_amount'] > $available_Superdiesel || $_POST['fuel_amount'] > $data['row']['dieselsuper_tank']) {
                  $fuelstock->errors['fuel_amount'] = "Tank capacity is not enough";
               }
            }

            if (empty($fuelstock->errors)) {
               $fuelstock->insert($_POST);

               $fuel_type=$_POST['fuel_type'];
               $fuel_amount = $_POST['fuel_amount'];
               $stations->insertremaininfuel($station_id, $fuel_type, $fuel_amount);
               // show($_POST);
               redirect('fuelrestock');
            }
         }
      }
      $data['errors'] = $fuelstock->errors;
      $this->view('stationadmin/fuelstock', $data);
   }
}
