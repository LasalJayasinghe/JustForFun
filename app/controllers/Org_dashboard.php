<?php

class Org_dashboard extends Controller
{
    public function index()
    {   
        $org = new Org();
        $brn = Auth::getbrn();

        $data['rows'] = $org->first(['brn' => $brn]);
        $data['title'] = "dashboard";
        $this->view("Organization/dashboard", $data);
    }
}