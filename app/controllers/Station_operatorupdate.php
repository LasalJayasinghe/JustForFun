<?php
class Station_operatorupdate extends Controller
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
        $data['rows'] =  $operators->where(['station_id' => $station_id]);
        $data['prow'] = $prow = $operators->where(['station_id' => $station_id, 'code' => $id]);

        // var_dump($data['prow']);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $prow) {
            if ($result = $operators->validate2($_POST)) {

                $newemail = $_POST['email'];
                $currentemail = $data['prow'][0]['email'];
                $queryy = "select * from operator where Email = :Email limit 1";

                if ($newemail !== $currentemail) {
                    if ($operators->query($queryy, ['email' => $newemail])) {
                        $operators->errors['Email'] = "That email already exists";
                    }
                }
                if (empty($operators->errors)) {
                    $operators->operatorupdate($id, $_POST);
                    redirect('operators');
                }
            }
        }

        $data['title'] = "operatorupdate";
        $data['errors'] = $operators->errors;
        $this->view('stationadmin/operatorupdate', $data);
    }
}
