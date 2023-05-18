<?php

class Customer_Dashboard extends Controller
{
    public function index()
    {

        $user = new Customer();
        $weekly = new WeeklyQuota();
        $vehicle = new Vehicle();


        $id = Auth::getnic();
        $data['row'] = $user->first(['nic' => $id]);

        $vehicleno = $data['row']['vehicleno'];
        $data['rows'] = $vehicle->first(['vehicleno' => $vehicleno]);

        $category = $data['rows']['category'];
        $data['r'] = $weekly->first(['vehicle_type' => $category]);

        $data['title'] = "Dashboard";
        $this->view('Customer/dashboard', $data);
    }
}


