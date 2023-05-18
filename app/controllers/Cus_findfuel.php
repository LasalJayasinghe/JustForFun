<?php

class Cus_findfuel extends Controller
{
    public function index()
    {
        $station = new Stations();
        $query = "SELECT * FROM station";
        $result = $station->query($query);

        foreach($result as $row){
            $DAResult[] = $row;
        }
        $data['DAResult'] = $DAResult;

        $data['title'] = "Find Fuel";
        $this->view('Customer/findfuel', $data);
    }
}
?>