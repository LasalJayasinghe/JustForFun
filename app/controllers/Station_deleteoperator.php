<?php
class Station_deleteoperator extends Controller
{
    public function index($id = null)
    {
        if (!Auth::logged_in()) {
            message('please login to view the admin section');
            redirect('station_login');
        }

        $operators = new Operator();
        $station_id = Auth::getStation_id();
        $data['code'] = $id;
        $data['prow'] =  $operators->where(['station_id' => $station_id, 'code' => $id]);


        $operators->operatordelete($station_id, $id);
        redirect('operators');

        $this->view('stationadmin/operators', $data);
    }
}
