<?php
class Org_addOther extends Controller
{
    public function index()
    {   
            $other = new other();
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // if($other->validate($_POST))
                
                    $brn= Auth::getbrn();
                    $_POST['brn'] = $brn;
                    $other->insert($_POST);

                    
                    message("Vehicle was succesfully added");
                    redirect('Org_other');
                
            }

        $data['title'] = "Vehicle Details";
        $this->view("Organization/addOther", $data);
    }

    
}