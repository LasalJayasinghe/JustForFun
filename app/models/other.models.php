<?php

class other extends Model{

    protected $table = "others";
    public $errors = [];
    public $allowed = ['id','machiene_no' , 'fuel', 'category' ,'capacity',  'brn'];

    // public function validate($data)
    // {
    //     $this->errors = [];
        
    //     // Validate vehicle number
    //     if (empty($data['machieneno'])) {
    //         $this->errors['machieneno'] = "The vehicle number field is required";
    //     }

    //     // Validate chassis number
    //     if (empty($data['chassis_number'])) {
    //         $this->errors['chassis_number'] = "The chassis number field is required";
    //     }

    //     if (empty($data['category'])) {
    //         $this->errors['category'] = "The vehicle category field is required";
    //     }

    //     return empty($this->errors);
    // }

    public function getmachieneno($machieneno = null ,$startAmount = null ,$endAmount = null )
    {
        $brn = Auth::getbrn();
        $query = "SELECT * FROM others WHERE brn = :brn";
        $data = [':brn' => $brn];
        if ($machieneno) {
            $query .= ' AND machiene_no LIKE :machieneno ';
            $data['machieneno'] = '%' . $machieneno . '%';
        }

        if ($startAmount) {
            $query .= ' AND capacity >= :startAmount ';
            $data['startAmount'] = $startAmount;
        }

        if($endAmount){
            $query .= ' AND capacity <= :endAmount ';
            $data['endAmount'] = $endAmount;
        }

    
        $res = $this->query($query, $data);
    
        if (is_array($res)) {
            return $res;
        }
        return false;
    }

    // public function getmachieneno($machieneno = null ,$startAmount = null ,$endAmount = null )
    // {
    //     $brn = Auth::getbrn();
    //     $query = "SELECT * FROM org_vehicles WHERE brn = :brn";
    //     $data = [':brn' => $brn];
    //     if ($machieneno) {
    //         $query .= ' AND machieneno LIKE :machieneno ';
    //         $data['machieneno'] = '%' . $machieneno . '%';
    //     }

    //     if ($startAmount) {
    //         $query .= ' AND monthly_used_amount >= :startAmount ';
    //         $data['startAmount'] = $startAmount;
    //     }

    //     if($endAmount){
    //         $query .= ' AND monthly_used_amount <= :endAmount ';
    //         $data['endAmount'] = $endAmount;
    //     }

    
    //     $res = $this->query($query, $data);
    
    //     if (is_array($res)) {
    //         return $res;
    //     }
    //     return false;
    // }


    // public function updateUsage($data){
    //     $sql = "UPDATE org_vehicles SET monthly_used_amount = monthly_used_amount + :amount WHERE machieneno = :machieneno";
    //     $querydata = [
    //         'machieneno' => $data['machieneno'],
    //         'amount' => $data['amount'],
    //     ];
    //     $result = $this->queryin($sql, $querydata);
    //     return $result;
    // }

}