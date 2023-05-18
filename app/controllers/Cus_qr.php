<?php

class Cus_Qr extends Controller
{
    public function index()
    {   
        $vehicles= new Vehicle(); // Create a new instance of the Vehicle class
        $vehicleno = Auth::getvehicleno(); // Get the vehicleno of the logged-in user and assign it to the 'vehicleno' variable

        $data['rows'] = $vehicles->first(['vehicleno' => $vehicleno]); // Retrieve the vehicle data from the Vehicle object based on the 'vehicleno' condition, and assign it to the 'rows' key of the 'data' array
        
        if ($data['rows']) {
            $UID = $data['rows']['chassis_number'];
        } else {
            // Handle the case when no vehicle data is found for the given vehicleno
            // For example, you can set a default value or display an error message
            $UID = "No vehicle data found";
        }
        
        $data['UID'] = $UID; // Pass the $UID value to the view
        
        
        $data['title'] = "QR page"; // Assign the value "QR page" to the 'title' key of the 'data' array

        $this->view("Customer/qr", $data); // Render the 'qr' view, passing in the 'data' array
    }   
}
