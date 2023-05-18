<?php 

class Signup extends Controller{
    
    public function index(){ 

        $usertype = $_GET['usertype'];
        $data['errors'] = [];

        //////// CREATE ADMIN  - ADMIN CREATES ACC. ///////
        if($usertype == 'admin'){
            $data['title'] = "Admin signup";
            $admin = new Admin();

            if($_SERVER['REQUEST_METHOD']=="POST"){
                if($admin->validate($_POST)){
                    
                    $new = [];
                    $new['username'] = $_POST['username'];
                    $new['email'] = $_POST['email'];
                    
                    $password = randomPassword();

                    $new['password'] = password_hash($password,PASSWORD_DEFAULT);

                    if($admin->insert($new)){
                        message("You have successfully signed up a new admin");
                        unset($_SESSION['newadmin']);
                        $_SESSION['newadmin']['username'] = $new['username'];
                        $_SESSION['newadmin']['email'] = $new['email'];
                        $_SESSION['newadmin']['password'] = $password;
                        redirect('sendpassword');                

                    }else{
                        echo('something went wrong');
                        die;
                    }

                }
        }

        $data['title'] = "Sign Up";
        $data['errors'] = $admin->errors;

        $this->view('admin/signup',$data);
        

        //////// CREATE OPERATOR  - ADMIN CREATES ACC.///////
        }elseif($usertype == 'operator'){
            $data['title'] = "Operator signup";
            $operator = new Operator;
            $this->view('operator/signup',$data);

            if($_SERVER['REQUEST_METHOD']=="POST"){
                $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
                show($_POST['password']);
            }


        //////// REGISTER CUSTOMER  - SELF SIGN UP///////
        }elseif($usertype == 'customer'){
            $data['title'] = "Customer signup";
            $customer = new Customer();

            if($_SERVER['REQUEST_METHOD']=="POST"){
                if($customer->validate($_POST)){

                    $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
                    $_SESSION['customerdetails'] = $_POST;
                    $_SESSION['USER_DATA'] = $_POST;
                    $_SESSION['type'] = 'customer';
                    
                    redirect('vehicle_registration');
                }
            }

            $data['title'] = "Sign Up";
            $data['errors'] = $customer->errors;

            $this->view('Customer/signup',$data);

        //////// REGISTER STATION - SELF SIGN UP ///////
        }elseif($usertype == 'station'){
            $data['title'] = "Station signup";
            $stations = new Stations();

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($result = $stations->validate1($_POST)) {


                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $_SESSION['stationdetails'] = $_POST;

                    redirect('Station_SignupMap');
                }
            }

            $data['errors'] = $stations->errors;

            $this->view('stationadmin/signup', $data);
        
        //////// REGISTER ORGANIZATION - SELF SIGN UP ///////
        }elseif($usertype == 'org'){
            $data['title'] = "Signup";
            $org = new Org();

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if($org->validate($_POST))
                {
                    $_POST['password_hash'] = password_hash($_POST['password_hash'], PASSWORD_DEFAULT);
                    $org->insert($_POST);
                    
                    message("Your profile was succesfully created");
                    redirect('login?usertype=org');
                }
            }
            $data['errors'] = $org->errors;
            $this->view("Organization/signup", $data);
        }
    }
}