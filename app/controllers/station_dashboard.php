<?php 

class Station_dashboard extends Controller
{
   public function index()
   {
      if (!Auth::logged_in()) {
         message('Please loginto the admin page');
         redirect('station_login');
      }

      $operators = new Operator();
      $fuelstock = new Fuelstock();
      $stations = new Stations();

      $station_id = Auth::getStation_id();
      $data = [];

      $data['oprows'] = $operators->whereOrder(['station_id' => $station_id],'loggedin_status');
      $data['rows'] = $fuelstock->whereOrder(['station_id' => $station_id], 'update_time');
      $data['strow'] = $stations->where(['station_id' => $station_id]);

      $data['title'] = "Dash";
      $this->view('stationadmin/dash', $data);
   }

}