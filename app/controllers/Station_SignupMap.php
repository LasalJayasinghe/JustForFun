
<?php


class Station_SignupMap extends Controller
{

   public function index($id = null)
   {
      $data = [];
      $stations = new Stations();

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
         $_SESSION['station_location'] = $_POST;
         redirect('Station_tankcapacity');
      }
      $data['errors'] = $stations->errors;
      $data['title'] = "Station_tankcapacity";

      $this->view('stationadmin/Station_signupmap', $data);
   }
}
