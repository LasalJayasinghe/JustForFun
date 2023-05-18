<?php 

class vehicle_registration extends Controller{
    
    public function index(){ //doesnt run automatically like the constructors do
        $customer = new Customer();
        $vehicle = new Vehicle();
        $weekly = new WeeklyQuota();

        if($_SERVER['REQUEST_METHOD']=="POST"){
     
            if($vehicle->validate($_POST)){
                $_SESSION['customerdetails']['vehicleno']= $_POST['vehicleno'];
                $_POST['owner_type'] = 'pvt';

                $_SESSION['customerdetails']['total_quota'] = $weekly->where(['vehicle_type'=>$_POST['category']])[0]['quota'];
                $_SESSION['customerdetails']['balance_quota'] = $_SESSION['customerdetails']['total_quota'];
                if($customer->insert($_SESSION['customerdetails'])){
                    
                    if($vehicle->insert($_POST)){
                        message("You have successfully signed up");
                        redirect('login?usertype=customer');
                    }
                    redirect('vehicle_registration');
                }
            }
        }

        $data['title'] = "Vehicle registration";
        $data['errors'] = $vehicle->errors;

        $this->view('Customer/vehiclereg',$data);
    }
}