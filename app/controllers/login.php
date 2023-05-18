<?php 

class Login extends Controller{
    
    public function index(){ 
        $usertype = $_GET['usertype'];
        $data['errors'] = [];

        //////////////// ADMIN LOGIN ///////////////
        if($usertype == 'admin'){
            $data['title'] = "administrator Login";
            $_SESSION['type'] = 'admin';
            $admin = new Admin();
            
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $row = $admin->first([
                        'username' => $_POST['username'],
                        //'password' => $_POST['password']
                    ]);

                    if($row){
                        
                        if(password_verify($_POST['password'], $row['password'])){
                            //authenticate if password and username match
                            if(!(Auth::authenticate($row))){
                                echo "soemthing wrong here";die;
                            }
                            
                            $_SESSION['email'] = $row['email'];
                            redirect('otp');
                        }else{
                        $data['errors']['password'] = "Password is incorrect";
                        }
                    }else{
                        $data['errors']['username'] = "Username is incorrect";
                    }
            }
            $this->view('admin/login',$data);
        }

        //////////////// OPERATOR LOGIN ///////////////
        elseif($usertype == 'operator'){
            $data['title'] = "operator login";
            $_SESSION['type'] = 'operator';
            $operator = new Operator();

            if($_SERVER['REQUEST_METHOD']=="POST"){
                $row = $operator->first([
                        'code' => $_POST['code']
                    ]);
                    
                    //give values to the user object
                    $operator->code = $_POST['code'];

                    if($row){
                        
                        if(password_verify($_POST['password'], $row['password'])){
                        // if($_POST['password'] == $row['password']){
                            if(!(Auth::authenticate($row))){
                                echo "soemthing wrong here";die;
                            }
                            $operator->updateLoggedinStatus($_POST['code']);
                            redirect('scanner');
                        }else{
                            $data['errors']['password'] = "Password is incorrect";
                        }
                    }else{
                        $data['errors']['username'] = "Username is incorrect";
                    }
            }

            $this->view('operator/login',$data);
        }

        //////////////// ORGANIZATION LOGIN ///////////////
        elseif($usertype == 'org'){
            $data['title'] = "Login";
            $_SESSION['type'] = 'org';

            $org = new Org();

            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $row = $org->first([
                    'brn' => $_POST['brn']
                ]);

                if($row){
                        
                    if(password_verify($_POST['password_hash'], $row['password_hash'])){
                        if(!(Auth::authenticate($row))){

                            echo "something wrong here";
                            die;
                        }
                        $_SESSION['type'] = 'org';
                        redirect('Org_dashboard');
                    }else{
                    $data['errors']['password_hash'] = "Password is incorrect";
                    }
                }else{
                    $data['errors']['brn'] = "Registration Number is incorrect";
                }
            }

            $this->view("Organization/login", $data);
        }

        //////////////// STATION LOGIN ///////////////
        elseif($usertype == 'station'){
            $data['title'] = "Station Admin Login";
            $_SESSION['type'] = 'station';

            $stations = new Stations();
            $data = [];

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // validate station_id and password fields
            $station_id = trim($_POST['station_id']);
            $password = trim($_POST['password']);

            if (empty($station_id)) {
                $data['errors']['station_id'] = "Station ID is required";
            } elseif (empty($password)) {
                $data['errors']['password'] = "Password is required";
            }

            // if no errors, attempt to authenticate user
            if (empty($data['errors'])) {
                $row = $stations->first([
                'station_id' => $_POST['station_id']
                ]);

                if ($row) {
                if (password_verify($password, $row['password'])) {
                    // authenticate if password and username match
                    if (!(Auth::authenticate($row))) {
                    $data['errors']['auth'] = "Authentication error";
                    } else {
                    $_SESSION['email'] = $row['email'];
                    // redirect('otp');
                    $_SESSION['type'] = 'station';
                    redirect('station_dashboard');
                    }
                } else {
                    $data['errors']['password'] = "password incorrect";
                }
                } else {
                $data['errors']['auth'] = "Station id or password incorrect";
                }
            }
            }

            $this->view('stationadmin/login', $data);
        }
        
        //////////////// CUSTOMER LOGIN ///////////////
        elseif($usertype == 'customer'){
            $data['title'] = "Login";
            $customer = new Customer();
            $_SESSION['type'] = 'customer';
        
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $row = $customer->first([
                    'email' => $_POST['email'],
                ]);
        
                if ($row) {
                    if (password_verify($_POST['password'], $row['password'])) {
                        if (!Auth::authenticate($row)) {
                            echo "something wrong here";
                            die;
                        }
                        // Update account_status to 1
                        $customer->updateStatus($row['nic'], 1);

                        $_SESSION['type'] = 'customer';
                        redirect('Customer_dashboard');
                    } else {
                        $data['errors']['password'] = "Password is incorrect";
                    }
                } else {
                    $data['errors']['email'] = "email is incorrect";
                }
            }
            $this->view('Customer/login', $data);
        }
        
    }
}