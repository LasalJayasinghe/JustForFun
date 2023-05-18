<?php

//admin model

class Operator extends Model
{

    protected $table = "operator";
    public $errors = [];
    public $allowed = ['station_id', 'code', 'password', 'name', 'email', 'loggedin_status', 'last_online', 'account_status'];

    public function validate($data)
    {
        $this->errors = []; //initializing the error array before running the function

        if (empty($data['name'])) {
            $this->errors['name'] = "The name field is required";
        }

        if (empty($data['code'])) {
            $this->errors['code'] = "The employee code field is required";
        }

        if (empty($data['email'])) {
            $this->errors['email'] = " Email field is required";
        } else

            //checks email validity
            if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
                $this->errors['email'] = "The email is invalid";
            } else

                //checks if email is already in the database or not
                if ($this->where(['email' => $data['email']])) {
                    $this->errors['email'] = "The email is already taken";
                }

        if (empty($this->errors)) {
            return true;
        }
        //return false;
    }


    public function validate2($data)
    {
        $this->errors = []; //initializing the error array before running the function

        if (empty($data['name'])) {
            $this->errors['name'] = "The name field is required";
        }

        if (empty($data['email'])) {
            $this->errors['email'] = " Email field is required";
        }
        if (empty($this->errors)) {
            return true;
        }
        //return false;
    }




    public function operatordelete($station_id, $id)
    {
        $query = 'DELETE FROM operator WHERE station_id = :station_id AND code = :code';
        $data = array(':station_id' => $station_id, ':code' => $id);
        $this->query($query, $data);
    }

    public function operatorupdate($id, $data)
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
            $query .= $key . "=:" . $key . ",";
        }

        $query = trim($query, ",");
        $query .= " where code = :id";
        $data['id'] = $id;

        $this->query($query, $data);
    }

    public function updateLoggedinStatus($code){
        $query = "UPDATE ".$this->table." SET loggedin_status = 1 WHERE code = :code";
        $this->queryin($query, ['code' => $code]);
    }

    public function updateLoggedoutStatus($code){
        $query = "UPDATE ".$this->table." SET loggedin_status = 0 WHERE code = :code";
        $this->queryin($query, ['code' => $code]);
    }
}
