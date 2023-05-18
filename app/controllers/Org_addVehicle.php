<?php
class Org_addVehicle extends Controller
{
    public function index()
    {   
            $user = new org_vehicles();
            $vehicles = new Vehicle();
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if($user->validate($_POST))
                {
                    $brn= Auth::getbrn();
                    $_POST['brn'] = $brn;
                    $_POST['owner_type'] = "org";
                    $user->insert($_POST);

                    $vehicles->insert($_POST);
                    
                    message("Vehicle was succesfully added");
                    redirect('Org_vehicle');
                }
            }

        $data['errors'] = $user->errors;
        $data['title'] = "Vehicle Details";
        $this->view("Organization/addvehicle", $data);
    }

    
}