<?php

//admin model

class Admin extends Model{

    protected $table = "System_admin";
    public $errors = [];
    public $allowed = ['username', 'password', 'email','approved'];

    public function validate($data){

        $this->errors = []; //initializing the error array before running the function

        if(empty($data['username'])){
            $this->errors['username'] = "The username field is required";
        }
        
        if(empty($data['email'])){
            $this->errors['email'] = "The email field is required";
        }else
        
        //checks email validity
        if(filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false){
            $this->errors['email'] = "The email is invalid";
        }else

        //checks if email is already in the database or not
        if($this->where(['email' => $data['email']])){
            $this->errors['email'] = "The email is already taken";
        }

        $query = "SELECT * FROM System_admin WHERE email = :email";
        
        
        if(empty($this->errors)){
            return true;
        }
        show($this->errors);die;
        //return false;
    }

    public function getadmins(){
        $result = $this->where(['approved' => 'pending']);
        return $result;
    }
}