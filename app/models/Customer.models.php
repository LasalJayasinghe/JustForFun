<?php

//customer model

class Customer extends Model{

    protected $table = "owners";
    public $errors = [];
    public $allowed = ['nic','phone','name', 'password', 'vehicleno','email','balance_quota','total_quota','expiry_date'];

    public function validate($data){

        $this->errors = []; //initializing the error array before running the function

        $nic = trim($data["nic"]);
        if (empty($data['nic'])) {
            $this->errors['nic'] = "NIC field is required";
       }
       elseif (!preg_match("/^[0-9]{9}[vVxX]$/", $nic) && !preg_match("/^[0-9]{12}$/", $nic)) {
           $this->errors['nic'] = "NIC number not valid";
       }       

       if (empty($data['phone'])) {
            $this->errors['phone'] = "Phone number field is required";
         }
         elseif (!preg_match("/^[0-9]{10}$/", trim($data["phone"]))) {
                $this->errors['phone'] = "Phone number not valid";
         }

        if(empty($data['name'])){
            $this->errors['name'] = "The username field is required";
        }
        if(empty($data['password'])){
            $this->errors['password'] = "The password field is required";
        }

        $password = $data['password'];
        // Password constraints
        if(empty($data['password'])){
            $this->errors['password'] = "The password field is required";
        }elseif (strlen($password) < 8) {
            $this->errors['password'] = "The password should be at least 8 characters long";
        } elseif (!preg_match("/[a-z]/", $password)) {
            $this->errors['password'] = "The password should contain at least one lowercase letter";
        } elseif (!preg_match("/[A-Z]/", $password)) {
            $this->errors['password'] = "The password should contain at least one uppercase letter";
        } elseif (!preg_match("/[0-9]/", $password)) {
            $this->errors['password'] = "The password should contain at least one number";
        } elseif (!preg_match("/[\W_]/", $password)) {
            $this->errors['password'] = "The password should contain at least one special character";
        }
    
        
        if(empty($data['email'])){
            $this->errors['email'] = "The email field is required";
        }else
        
        if(filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false){
            $this->errors['email'] = "The email is invalid";
        }else

        if($this->where(['email' => $data['email']])){
            $this->errors['email'] = "The email is already taken";
        }

        if($data['password'] !== $data['verify_password']){
            $this->errors['verify_password'] = "The passwords do not match";
        }
        
        
        if(empty($this->errors)){
            return true;
        }

        // show($this->errors);die;
        //return false;
    
}
    public function update($id, $data)
    {

        if (!empty($this->allowed)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowed)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        // $values = array_values($data);

        $query = "update " . $this->table . " set ";

        foreach ($keys as $key) {
            $query .= $key ."=:" . $key . ",";
        }

        $query = trim($query, ",");
        $query .= " where nic = :id";
        $data['nic'] = $id;
        
        $this->query($query, $data);
    }


    public function disableUser($id){
        $this->update(['account_status' => 0], $id);
    }

    public function enableUser($id){
        $this->update(['account_status' => 1], $id);
    }

    public function updateQuota($data){
        $query = "update " . $this -> table . " set balance_quota = :balance_quota where vehicleno = :vehicleno";
        if($this->queryin($query, $data)){
            show($querydata);
            return true;
        }
    }
    public function validate5($data5)
    {
        $this->errors = [];

        if (empty($data5['oldPassword'])) {
            $this->errors['oldPassword'] = "Current password is required";
        }
        if (empty($data5['password'])) {
            $this->errors['password'] = "New password is required";
        }
        if (empty($data5['c_np'])) {
            $this->errors['c_np'] = "Confirm password is required";
        } elseif ($data5['password'] !== $data5['c_np']) {
            $this->errors['c_np'] = "Passwords do not match";
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }


    public function changepassword($id, $newData)
    {
        // Hash the new password
        $hashedPassword = password_hash($newData['password'], PASSWORD_DEFAULT);
    
        $query = "UPDATE owners SET password=:password WHERE nic=:id";
        $data = array(
            ':password' =>$newData['password'],
            ':id' => $id
        );
        $this->query($query, $data);
    }
    
    public function updateStatus($nic, $status)
    {
        $query = "UPDATE owners SET account_status=:status WHERE nic=:nic";
        $data = array(
            ':status' => $status,
            ':nic' => $nic
        );
        $this->query($query, $data);
    }
    
}