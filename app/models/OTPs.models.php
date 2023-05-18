<?php

class OTPs extends Model{

    protected $table = "OTP";
    public $errors = [];
    public $allowed = ['email', 'otp'];

    public function saveotp($otpdata){
        $otpdata['otp'] = password_hash($otpdata['otp'], PASSWORD_DEFAULT);
        return $this->insert($otpdata);
    }

    public function deleteotp($querydata){
        $query = "DELETE FROM OTP WHERE email = :email";
        if($this->queryin($query,$querydata)){
            return true;
        }
        else return false;
    }

    public function insertAndDeleteOtps($emailotp) {
        $sql = "CALL insert_and_delete_otps(:email, :otp)";
        if($this->queryin($sql, $emailotp)){
            return true;
        }
        else return false;
    }
    
}