<?php

class Station_profile extends Controller
{
    public function index()
    {

        if (!Auth::logged_in()) {
            message('Please loginto the admin page');
            redirect('station_login');
        }

        $stations = new Stations();
        $station_id = Auth::getStation_id();
        $data['row'] = $row = $stations->first(['station_id' =>  $station_id]);

        $data['title'] = "Profile";
        $this->view('stationadmin/profile', $data);
    }
}
