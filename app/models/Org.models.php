<?php

class Org extends Model
{
    public  $errors = [];
    protected $table = "organization";

    public $allowed = [
        'companyname',
        'brn',
        'email',
        'mobileno',
        'password_hash',
        'diesel_balance',
        'petrol_balance',
        'diesel_quota',
        'petrol_quota',
        'vehicle_count'
    ];

    public function validate($data)
    {   
        $this -> errors = [];

        //Validate Company Name
        if(empty($data['companyname']))
        {
            $this->errors['companyname'] = "Company name is required";
        }

        //Validate BRN
        if(empty($data['brn']))
        {
            $this->errors['brn'] = "Business Registration Number is required";
        }
        else
        {
            if($this->where(['brn' => $data['brn']])){
                $this->errors['brn'] = "BRN is already taken";
            }
        }
        $brnPattern = "/^[A-Za-z]{2}\d{5}$/";
        if (!preg_match($brnPattern, $data['brn'])) {
          $this->errors['brn'] = "Invalid BRN.";
        }

        //Email Validation
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "Email is invalid";
        }else
        {
            if($this->where(['email' => $data['email']])){
                $this->errors['email'] = "Email is already taken";
            }
        }

        //Mobile Number Validation
        if(empty($data['mobileno']))
        {
            $this->errors['mobileno'] = "Mobile Number is required";
        }else
        {
            if($this->where(['mobileno' => $data['mobileno']])){
                $this->errors['mobileno'] = "Mobile No. is already taken";
            }else if(!preg_match('/^[0-9]{10}$/', $data['mobileno']))
            {
                $this->errors['mobileno'] = "Mobile No. is invalid";
            }
        }

        //Password Validation
        if(empty($data['password_hash']))
        {
            $this->errors['password_hash'] = "Password is required";
        } elseif (strlen($data['password_hash']) < 8) {
            $this->errors['password_hash'] = "Password must be at least 8 characters long.";
        } elseif (!preg_match("#[0-9]+#", $data['password_hash'])) {
            $this->errors['password_hash'] = "Password must include at least one number.";
        } elseif (!preg_match("#[a-zA-Z]+#", $data['password_hash'])) {
            $this->errors['password_hash'] = "Password must include at least one letter.";
        } elseif (!preg_match("#\W+#", $data['password_hash'])) {
            $this->errors['password_hash'] = "Password must include at least one special character.";
        }
        

        if(empty($data['password_confirmation']))
        {
            $this->errors['password_confirmation'] = "Password confirmation is required";
        }
        if($data['password_hash'] !== $data['password_confirmation'])
        {
            $this->errors['password_confirmation'] = "Password confirmation does not match";
        } 

        if(empty($this->errors))
        {
            return true;
        }

        return false;

    }

    public function getOrgDetails($BRN = null){
        $sql = "SELECT * FROM $this->table";
        
        if($BRN != null){
            $sql .= " WHERE BRN = :BRN";
            $querydata = ['BRN' => $BRN];
        }
        $result = $this->query($sql, $querydata);
        return $result;
    }

    public function updateQuota($data, $field){
        $query = "UPDATE " . $this -> table . " SET $field = :balance_quota WHERE brn = :brn";
        if($this->queryin($query, $data)){
            show($data);
            return true;
        }
    }

    public function getDetails($min_v = null, $max_v = null, $name = null){
        $data = ['type' => 'post'];
        $query = 'SELECT * FROM ' . $this->table . ' WHERE account_status = 1';
    
        if ($min_v) {
            $query .= ' AND vehicle_count >= :min_v';
            $data['min_v'] = $min_v;
        }
    
        if ($max_v) {
            $query .= ' AND vehicle_count <= :max_v';
            $data['max_v'] = $max_v;
        }
    
        if ($name) {
            $query .= ' AND (companyname LIKE :name)';
            $data['name'] = '%' . $name . '%';
        }
    
        $query .= ' ORDER BY brn DESC';
    
        $res = $this->query($query, $data);
    
        if (is_array($res)) {
            return $res;
        }
        return false;
    }


    public function updatePetrolQuota($vehicle_type, $newQuota) {
        $query = "UPDATE " . $this->table . " SET petrol_quota = :newQuota WHERE brn = :brn";
        $data = [
            ':newQuota' => $newQuota,
            ':brn' => $vehicle_type
        ];
    
        $this->queryin($query, $data);
    }

    public function updateDieselQuota($vehicle_type, $newQuota) {
        $query = "UPDATE " . $this->table . " SET diesel_quota = :newQuota WHERE brn = :brn";
        $data = [
            ':newQuota' => $newQuota,
            ':brn' => $vehicle_type
        ];
    
        $this->queryin($query, $data);
    }
}