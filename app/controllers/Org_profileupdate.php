<?php
class Org_profileupdate extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            message('please login to view the admin section');
            redirect('login');
        }

        $Org = new Org();
        $id = Auth::getid();

        $data['row'] = $row = $Org->first(['id' => $id]);


        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {

            $Org->update($id,$_POST);
            redirect('Profile');
            }
        $data['errors'] = $Org->errors;
        $data['title'] = "Profileupdate";
        $this->view('Organization/profileupdate', $data);
    }
}



