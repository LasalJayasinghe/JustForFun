<?php 

class otpVerification extends Controller{
    
    public function index(){
        
        $data['title'] = "verification";
        $data['errors'] = [];
        
        $otp= new OTPs();
        $this->view('otp',$data);

        if($_SERVER['REQUEST_METHOD']=="POST"){
            // $otp->deleteotp(['email' => $_SESSION['USER_DATA']['email']]);

            $row = $otp->first(['email' => $_SESSION['USER_DATA']['email']]); //searches for active OTPs : works
            $otpvalue = $_POST['1'].$_POST['2'].$_POST['3'].$_POST['4'].$_POST['5'].$_POST['6'];
            
            if($row){
                if(password_verify($otpvalue, $row['otp'])){
                    if($otp->deleteotp(['email' => $_SESSION['USER_DATA']['email']])){
                        if($_SESSION['type'] == 'admin'){
                            redirect('admin_dashboard');
                        }else{
                            redirect('vehicle_registration');
                        }
                    }
                    
                }else{
                    $data['errors']['otp'] = "OTP is incorrect or expired";
                    $_SESSION['counter'] = $_SESSION['counter'] + 1;
                    print($_SESSION['counter']);
                    if($_SESSION['counter'] == 3){ //to prevent brute force attacks idk if this is the right way to do it
                       // $otp->deleteotp($data);  //disables the otp
                        unset($_SESSION['counter']);
                        if($_SESSION['type'] == 'admin'){
                            redirect('login?usertype=admin');
                        }else{
                            redirect('signup?usertype=customer');
                        }
                    }
                }
            }

            if(array_key_exists('resend',$_POST)){ //resends OTP: works
                redirect('otp');
            }
        }
    }
}

