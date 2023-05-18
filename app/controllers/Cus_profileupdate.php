<?php
class Cus_profileupdate extends Controller
{
    public function index()
    {

        if (!Auth::logged_in()) {
            message('please login to view the page');
            redirect('login');
        }

        $Cus = new Customer();
        $id = Auth::getnic();

        $data['row'] = $row = $Cus->first(['nic' => $id]);


        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {

            $Cus->update($id,$_POST);
            redirect('Profile');
            }
        $data['errors'] = $Cus->errors;
        $data['title'] = "Profileupdate";
        $this->view('Customer/profileupdate', $data);
    }
}



