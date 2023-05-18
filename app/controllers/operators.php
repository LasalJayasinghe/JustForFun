<?php
class Operators extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            message('please login to view the admin section');
            redirect('station_login');
        }
        $operators = new Operator();
        $station_id = Auth::getStation_id();
        $data['errors'] = ' ';
        $data['rows'] =  $operators->where(['station_id' => $station_id]);

        $data['errors'] = $operators->errors;
        $data['title'] = "operators";
        $this->view('stationadmin/operators', $data);
       

    }
}
