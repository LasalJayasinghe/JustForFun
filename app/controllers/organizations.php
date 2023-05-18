<?php 

class Organizations extends Controller{
    
    public function index(){

        $data['title'] = "organizations view";
        $org = new Org();

        $min_v = isset($_GET['min_vehicle']) ? $_GET['min_vehicle'] : null;
        $max_v = isset($_GET['max_vehicle']) ? $_GET['max_vehicle'] : null;
        $company = isset($_GET['company_search']) ? $_GET['company_search'] : null;

        // Pass the filter inputs to the model method
        $data['tablecontent'] = $org->getDetails($smin_v, $max_v, $comp_search);


        $this->view('admin/organizations',$data);
    }

    public function updatePetrolQuota(){
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['brn'];
        $newQuota = $input['quota'];

        error_log('Received data for updatepetrolquota: ' . print_r($input, true));
    
        $organization = new Org();
        $organization->updatePetrolQuota($id, $newQuota); 
    
        http_response_code(200);
    }

    public function updateDieselQuota(){
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['brn'];
        $newQuota = $input['quota'];

        error_log('Received data for updatedieslquota: ' . print_r($input, true));
    
        $organization = new Org();
        $organization->updateDieselQuota($id, $newQuota); 
    
        http_response_code(200);
    }
}