<?php

// Vehicle model
class Transaction extends Model
{
    public $errors = [];
    protected $table = "transactions";
    public $allowed = ['search_words','station_id','update_time','fuel_type', 'fuel_amount' ,'transaction_id','operator'];


    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['transaction_id'])) {
            $this->errors['transaction_id'] = "transaction_id is required";
        }

        if (empty($data['operator'])) {
            $this->errors['operator'] = "operator is required";
        }

        if (empty($data['vehicle'])) {
            $this->errors['vehicle'] = "vehicle is required";
        }

       if(empty($data['fuel_type']))
       {
            $this->errors['fuel_type'] = "fuel type is required";
       }

        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function gettransaction($dateFrom = null, $dateTo = null, $search_user = null, $fuel_type = null, $station_id, $data = [])
    {
        $query = 'SELECT * FROM transactions WHERE station_id = ' . $station_id;

        if ($dateFrom) {
            $query .= ' AND update_time >= :dateFrom';
            $data['dateFrom'] = $dateFrom;
        }

        if ($dateTo) {
            $query .= ' AND update_time <= :dateTo';
            $data['dateTo'] = $dateTo;
        }

        if ($fuel_type) {
            $query .= ' AND fuel_type = :fuel_type';
            $data['fuel_type'] = $fuel_type;
        }

        if ($search_user) {
            $query .= ' AND operator = :search_user';
            $data['search_user'] = $search_user;
        }

        $query .= ' ORDER BY transaction_id DESC';

        $res = $this->query($query, $data);

        if (is_array($res)) {
            return $res;
        }
        return false;
    }

    public function getDistributionData($station_id, $fuel_type) {
        if ($fuel_type === '') {
            $sql = "SELECT MONTHNAME(CONCAT('2023-', derived.month, '-01')) as month, SUM(derived.amount) as total
            FROM (
                SELECT MONTH(update_time) as month, SUM(fuel_amount) as amount
                FROM transactions
                WHERE station_id = :station_id
                GROUP BY MONTH(update_time)
            ) as derived
            GROUP BY derived.month
            ORDER BY derived.month ASC";
            $queryData = ['station_id' => $station_id];
        } else {
            // SQL query to get distribution data grouped by month
            $sql = "SELECT MONTHNAME(CONCAT('2023-', derived.month, '-01')) as month, SUM(derived.amount) as total
        FROM (
            SELECT MONTH(update_time) as month, SUM(fuel_amount) as amount
            FROM transactions
            WHERE station_id = :station_id AND fuel_type = :fuel_type
            GROUP BY MONTH(update_time)
        ) as derived
        GROUP BY derived.month
        ORDER BY derived.month ASC";
            $queryData = ['station_id' => $station_id, 'fuel_type' => $fuel_type];
        }

        $data['distribution-month'] = $this->query($sql, $queryData);

        // Prepare the data for the chart
        $months = [];
        $distribution = [];
        foreach ($data['distribution-month'] as $row) {
            $months[] = $row['month'];
            $distribution[] = $row['total'];
        }

        return ['months' => $months, 'distribution' => $distribution];
    }


    public function getStationData()
    {
        $station_id = $_SESSION['USER_DATA']['station_id'];
        $query = "SELECT * FROM stations WHERE id = :station_id";
        $data = [
            'station_id' => $station_id
        ];
        $result = $this->query($query, $data);
        return $result;
    }

    public function getCurrentFuelAmount()
    {
        $query = 'SELECT fuel_amount FROM transactions ORDER BY transaction_id DESC LIMIT 1';
        $result = $this->query($query);

        if ($result && count($result) > 0) {
            return $result[0]['fuel_amount'];
        }

        return 0; // Return a default value if no fuel amount is found
    }
    public function gettransactions($dateFrom = null, $dateTo = null, $station_search = null)
    {
        $search_words = $_SESSION['USER_DATA']['search_words'];
        $query = 'SELECT t.*, s.name AS station_name FROM transactions t JOIN station s ON t.station_id = s.station_id WHERE t.search_words = :search_words';
    
        $data = ['search_words' => $search_words];
    
        if ($dateFrom) {
            $query .= ' AND t.update_time >= :dateFrom';
            $data['dateFrom'] = $dateFrom;
        }
    
        if ($dateTo) {
            $query .= ' AND t.update_time <= :dateTo';
            $data['dateTo'] = $dateTo;
        }
    
        if ($station_search) {
            $query .= ' AND s.name LIKE :station_search';
            $data['station_search'] = '%' . $station_search . '%';
        }
    
        $query .= ' ORDER BY t.update_time DESC';
    
        $res = $this->query($query, $data);
    
        if (is_array($res)) {
            return $res;
        }
    
        return false;
    }
    
    
    public function getVehicleno($search_words = null ,$start_date = null ,$end_date = null )
    {
        $brn = Auth::getbrn();
        $query = "SELECT * FROM transactions WHERE brn = :brn";
        $data = [':brn' => $brn];
        if ($search_words) {
            $query .= ' AND vehicleno LIKE :search_words ';
            $data['search_words'] = '%' . $search_words . '%';
        }

        if ($start_date) {
            $query .= ' AND update_time >= :start_date ';
            $data['start_date'] = $start_date;
        }

        if($end_date){
            $query .= ' AND update_time <= :end_date ';
            $data['end_date'] = $end_date;
        }

    
        $res = $this->query($query, $data);
    
        if (is_array($res)) {
            return $res;
        }
        return false;
    }
    
    
    
    
}