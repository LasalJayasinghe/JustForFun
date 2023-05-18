<?php

class Profile extends Controller
{
    public function index()
    {   

      $user = $_SESSION['type'];

      if($user == 'org'){
       if (!Auth::logged_in()) {
          message('Please log into the admin page');
          redirect('login');
       }
 
       $id =  Auth::getbrn();
       $Org = new Org();
       $data['row'] = $Org->first(['brn' => $id]);
       
       $data['title'] = "Profile"; 
       $this->view('Organization/profile', $data);
    }

    if($user == 'customer'){
      if (!Auth::logged_in()) {
         message('Please log into the admin page');
         redirect('login');
      }

      $id =  Auth::getnic();
      $Cus = new Customer();
      $data['row'] = $Cus->first(['nic' => $id]);
      
      $Vehicle = new Vehicle();
      $data['vehicles'] = $Vehicle->first(['vehicleno' => $data['row']['vehicleno']]);
      $data['title'] = "Profile"; 

      // Check if the disable form is submitted
      if (isset($_POST['disable'])) {
         $Cus->updateStatus($id, 0); // Update account_status to 0 (disabled)
         redirect('signin'); // Log out the user
   }

      $this->view('Customer/profile', $data);
   }

   if($user == 'station'){
       if (!Auth::logged_in()) {
           message('Please loginto the admin page');
           redirect('station_login');
       }

       $stations = new Stations();
       $station_id = Auth::getStation_id();
       $data['row'] = $row = $stations->first(['station_id' =>  $station_id]);

       $data['title'] = "Profile";
       $this->view('stationadmin/profile', $data);
   }


   if(array_key_exists('disable', $_POST)){
      $customer = new Customer();
      $vehicle = new Vehicle();

      $query = "UPDATE Owners SET account_status = 0 WHERE nic = :nic"; 
      $querydata = ['nic' => Auth::getnic()];

      $customer->query($query, $querydata);

      $query = "UPDATE Vehicles SET use_status = 0 WHERE vehicleno = :vehicleno";
      $querydata = ['vehicleno' => $data['vehicles']['vehicleno']];
      $vehicle->query($query, $querydata);

      redirect('logout');
   }
    
}

}