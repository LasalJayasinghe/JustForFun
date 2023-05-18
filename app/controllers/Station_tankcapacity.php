
<?php


class Station_tankcapacity extends Controller
{

   public function index($id = null)
   {

      $data['errors'] = [];

      $stations = new Stations();

      if ($_SERVER['REQUEST_METHOD'] == "POST") {

         if ($result = $stations->validate2($_POST)) {
            $data['station'] = array_merge($_SESSION['stationdetails'], $_SESSION['station_location'], $_POST);


            if ($_POST['petrol95_bal'] > $_POST['petrol95_tank']) {
               $stations->errors['petrol95_bal'] = "Tank capacity is not enough";
            }


            if ($_POST['petrol92_bal'] > $_POST['petrol92_tank']) {
               $stations->errors['petrol92_bal'] = "Tank capacity is not enough";
            }


            if ($_POST['dieselauto_bal'] > $_POST['dieselauto_tank']) {
               $stations->errors['dieselauto_bal'] = "Tank capacity is not enough";
            }


            if ($_POST['dieselsuper_bal'] > $_POST['dieselsuper_tank']) {
               $stations->errors['dieselsuper_bal'] = "Tank capacity is not enough";
            }
         }

         if (empty($stations->errors)) {
            if ($stations->insert($data['station'])) {
               redirect('login?usertype=station');
            }
         }
      }

      $data['errors'] = $stations->errors;
      $data['title'] = "Station_tankcapacity";

      $this->view('stationadmin/station_tankcapacity', $data);
   }
}
