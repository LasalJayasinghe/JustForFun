<?php

class Station_operatorpasswordchange extends Controller
{
    public function index($id = null)
    {
        if (!Auth::logged_in()) {
            message('please login to view the admin section');
            redirect('station_login');
        }

        $data['title'] = "operatotpasswordchange";
        $operators = new Operator();
        $station_id = Auth::getStation_id();

        $data['code'] = $id;
        $data['prow'] =  $operators->where(['station_id' => $station_id, 'code' => $id]);

        $_SESSION['newoperator']['password'] = randomPassword();
        $_SESSION['newoperator']['email'] = $data['prow'][0]['Email'];
        $_SESSION['newoperator']['name'] = $data['prow'][0]['name'];
        $_SESSION['newoperator']['code'] = $data['prow'][0]['code'];

        $_POST['password'] = password_hash($_SESSION['newoperator']['password'], PASSWORD_DEFAULT);
        $operators->operatorupdate($id, $_POST);

        redirect('sendpassword');

        $this->view('stationadmin/operators', $data);
    }
}
