<?php

class Station_deletefuel extends Controller
{
    public function index($id = null)
    {
        if (!Auth::logged_in()) {
            message('please login to view the admin section');
            redirect('station_login');
        }

        $fuelstock = new Fuelstock();
        $stations = new Stations();
        $station_id = Auth::getStation_id();
        $data['restocking_id'] = $id;
        $data['frow'] = $fuelstock->where(['station_id' => $station_id, 'restocking_id' => $id]);

        $ftype = $data['frow'][0]['fuel_type'];
        $famount = $data['frow'][0]['fuel_amount'];

        $stations->removedeletedfuelfromstation($station_id, $ftype, $famount);
        $fuelstock->fueldetaildelete($station_id, $id);
        redirect('stationadmin/fuelstock');
    }
}
