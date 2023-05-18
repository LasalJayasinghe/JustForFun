<?php 

class Customers extends Controller{
    
    public function index(){

        $data['title'] = "customers";
        $customer = new Customer();

        $data['city'] = $customer->getloc(); //to gte the city names from the database (avoid unnecessary typing)

        if(array_key_exists('filter', $_POST)) {

            $sql= "SELECT * FROM Owners";
    
            $res = filter($data);
        
        }else{
            $data['customers'] = $customer->findall();
        }
        
        $this->view('admin/customers',$data);
    }

}