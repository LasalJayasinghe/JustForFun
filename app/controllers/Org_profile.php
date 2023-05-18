<?php

class Org_profile extends Controller
{
    public function index()
    {   

       if (!Auth::logged_in()) {
          message('Please log into the admin page');
          redirect('Org_login');
       }
       $User = new Org();
       $id =  Auth::getbrn();
       $data['row'] = $User->first(['brn' => $id]);
       $data['title'] = "Profile"; 
       $this->view('Organization/profile', $data);

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $file = $_FILES['zip_file'];
          $zip_data = file_get_contents($file['tmp_name']);
          $zip->insertZipFile($zip_data);
          echo "File uploaded successfully.";
      } else {
          echo "Invalid request method.";
      }
  }

    
}