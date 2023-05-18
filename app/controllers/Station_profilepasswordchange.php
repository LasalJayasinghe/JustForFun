<?php
class Station_profilepasswordchange extends Controller
{
    public function index($id = null)
    {
        if (!Auth::logged_in()) {
            message('please login to view the admin section');
            redirect('station_login');
        }

        $stations = new Stations();
        $station_id = Auth::getStation_id();
        $password = Auth::getPassword();

        $data['row'] = $row = $stations->first(['station_id' =>  $station_id]);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {

            if ($result = $stations->validate5($_POST)) {

                $oldpassword = $_POST['oldPassword'];

                if ($password != password_hash($oldpassword, PASSWORD_DEFAULT)) {
                    $stations->errors['password'] = "Old Password Is Wrong";
                }

                if (empty($stations->errors)) {
                    $stations->stationchangepassword($station_id, $_POST);
                    redirect('Station_profile');
                }
            }
        }
        $data['title'] = "opchangepassword";
        $data['errors'] = $stations->errors;
        $this->view('stationadmin/profilepasswordupdate', $data);
    }
}
