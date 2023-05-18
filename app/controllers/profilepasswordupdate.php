<?php
class profilepasswordupdate extends Controller
{
    public function index($id = null)
    {
        if (!Auth::logged_in()) {
            message('please login to view the section');
            redirect('login');
        }

        $customer=new Customer;
        $id = Auth::getnic();
        $password = Auth::getPassword();

        $data['row'] = $row = $customer->first(['nic' =>  $id]);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {

            if ($result = $customer->validate5($_POST)) {

                $oldpassword = $_POST['oldPassword'];

                if (!password_verify($oldpassword, $password)) {
                    $customer->errors['oldPassword'] = "Old Password Is Wrong";
                }
                
                if (empty($customer->errors)) {
                    // Hash the new password
                    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    
                    // Update the password in the database
                    $customer->changepassword($id, ['password' => $hashedPassword]);

                    // Update the $_SESSION['USER_DATA']['password'] with the new hashed password
                    $_SESSION['USER_DATA']['password'] = $hashedPassword;

                    redirect('profile');

                }
                
                
            }
        }
        $data['title'] = "change password";
        $data['errors'] = $customer->errors;
        $this->view('Customer/profilepasswordupdate', $data);
    }
}