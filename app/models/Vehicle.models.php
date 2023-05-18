<?php

// Vehicle model
class Vehicle extends Model
{
    protected $table = "vehicles";
    public $errors = [];
    public $allowed = ['vehicleno','category','fuel','chassis_number','owner_type'];

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

    public function getCategoryCount($ownerType) {
        $sql = "SELECT category, COUNT(*) as count FROM vehicles WHERE owner_type = :ownerType GROUP BY category";
        $queryData = ['ownerType' => $ownerType];
        $result = $this->query($sql, $queryData);
        return $result;
    }

    public function getCount($table, $field = 'account_status')
    {
        $sql = "SELECT COUNT(*) as count FROM $table WHERE $field = 1";
        $result = $this->query($sql);
        return $result[0]['count'];
    }
    // function getCount($data, $category) {
    //     foreach ($data as $item) {
    //         if ($item['category'] === $category) {
    //             return $item['count'];
    //         }
    //     }
    //     return 0;  // return 0 if the category is not found
    // }

}
