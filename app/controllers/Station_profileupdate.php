<?php
class Station_profileupdate extends Controller
{
    public function index($id = null)
    {
        if (!Auth::logged_in()) {
            message('please login to view the admin section');
            redirect('station_login');
        }

        $stations = new Stations();
        $station_id = Auth::getStation_id();
        $data['row'] = $row = $stations->first(['station_id' =>  $station_id]);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {

            if ($stations->validate6($_POST)) {

                $newemail = $_POST['email'];
                $currentemail = $row['email'];
                $queryy = "select * from station where email = :email limit 1";

                if ($newemail !== $currentemail) {
                    if ($stations->query($queryy, ['email' => $newemail])) {
                        $stations->errors['email'] = "That email already exists";
                    }
                }
                if (empty($stations->errors)) {

                    $stations->stationupdate($station_id, $_POST);
                    redirect('Station_profile');
                }
            } else {
                $data['errors'] = $stations->errors;
            }
        }

        $data['errors'] = $stations->errors;
        $data['title'] = "Profileupdate";
        $this->view('stationadmin/profileupdate', $data);
    }
}
