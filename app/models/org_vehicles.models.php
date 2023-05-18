<?php

class Org_Vehicles extends Model{

    protected $table = "org_vehicles";
    public $errors = [];
    public $allowed = ['vehicleno','brn' , 'account_status', 'monthly_used_amount'];

    public function validate($data)
    {
        $this->errors = [];
        
        // Validate vehicle number
        if (empty($data['vehicleno'])) {
            $this->errors['vehicleno'] = "The vehicle number field is required";
        }

        // Validate chassis number
        if (empty($data['chassis_number'])) {
            $this->errors['chassis_number'] = "The chassis number field is required";
        }

        if (empty($data['category'])) {
            $this->errors['category'] = "The vehicle category field is required";
        }

        return empty($this->errors);
    }

    public function getVehicleno($vehicleno = null ,$startAmount = null ,$endAmount = null )
    {
        $brn = Auth::getbrn();
        $query = "SELECT * FROM org_vehicles WHERE brn = :brn";
        $data = [':brn' => $brn];
        if ($vehicleno) {
            $query .= ' AND vehicleno LIKE :vehicleno ';
            $data['vehicleno'] = '%' . $vehicleno . '%';
        }

        if ($startAmount) {
            $query .= ' AND monthly_used_amount >= :startAmount ';
            $data['startAmount'] = $startAmount;
        }

        if($endAmount){
            $query .= ' AND monthly_used_amount <= :endAmount ';
            $data['endAmount'] = $endAmount;
        }

    
        $res = $this->query($query, $data);
    
        if (is_array($res)) {
            return $res;
        }
        return false;
    }


    public function updateUsage($data){
        $sql = "UPDATE org_vehicles SET monthly_used_amount = monthly_used_amount + :amount WHERE vehicleno = :vehicleno";
        $querydata = [
            'vehicleno' => $data['vehicleno'],
            'amount' => $data['amount'],
        ];
        $result = $this->queryin($sql, $querydata);
        return $result;
    }

    // public function getCategoryCount($ownerType) {
    //     $sql = "SELECT category, COUNT(*) as count FROM vehicles WHERE owner_type = :ownerType GROUP BY category";
    //     $queryData = ['ownerType' => $ownerType];
    //     $result = $this->query($sql, $queryData);
    //     return $result;
    // }

    // function getCount($data, $category) {
    //     foreach ($data as $item) {
    //         if ($item['category'] === $category) {
    //             return $item['count'];
    //         }
    //     }
    //     return 0;  // return 0 if the category is not found
    // }




    // public function getVehicle($BRN){
    //     $sql = "SELECT * FROM org_vehicles WHERE BRN = :BRN";
    //     $querydata = ['BRN' => $BRN];
    //     $result = $this->query($sql);
    //     return $result;
    // }

//     public function getOrg($vehicleno){
//         $sql = "SELECT * FROM org_vehicles WHERE vehicleno = :vehicleno";
//         $querydata = ['vehicleno' => $vehicleno];
//         $result = $this->query($sql);
//         return $result;
//     }

//     public function insertNew($data){
//         $sql = "INSERT INTO org_vehicles (vehicleno, BRN) VALUES (:vehicleno, :BRN)";
//         $querydata = ['vehicleno' => $data['vehicleno'], 'BRN' => $data['BRN']];
//         $result = $this->query($sql, $querydata);
//         return $result;
//     }

//     public function deleteVehicle($vehicleno){
//         $sql = "DELETE FROM org_vehicles WHERE vehicleno = :vehicleno";
//         $querydata = ['vehicleno' => $vehicleno];
//         $result = $this->query($sql, $querydata);
//         return $result;
//     }

//     public function getVehicleCount($BRN){
//         $sql = "SELECT COUNT(*) as count FROM org_vehicles WHERE BRN = :BRN";
//         $querydata = ['BRN' => $BRN];
//         $result = $this->query($sql, $querydata);
//         return $result;
//     }
}