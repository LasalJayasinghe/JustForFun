<?php



class Fuelstock extends Model
{


    public $errors = [];
    protected $table = "fuelstock";


    public $allowed = [
        'station_id',
        'fuel_amount',
        'fuel_type',
        'update_time',
    ];



    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['fuel_amount'])) {
            $this->errors['fuel_amount'] = "fuel_amount is required";
        } elseif ($data['fuel_amount'] < 0) {
            $this->errors['fuel_amount'] = "Invalid input. Fuel amount cannot be negative.";
        } elseif (empty($data['fuel_type'])) {
            $this->errors['fuel_type'] = "fuel_type is required";
        } elseif (empty($this->errors)) {
            return true;
        }
        return false;
    }


    

    public function fueldetaildelete($station_id, $id)
    {
        $query = 'DELETE FROM fuelstock WHERE station_id = :station_id AND restocking_id = :restocking_id';
        $data = array(
            ':station_id' => $station_id,
            ':restocking_id' => $id
        );
        $this->query($query, $data);
    }


    public function getFuelStock($dateFrom = null, $dateTo = null, $fuel_search = null, $station_id, $data = [])
    {
        $query = 'SELECT * FROM fuelstock WHERE station_id = ' . $station_id;

        if ($dateFrom) {
            $query .= ' AND update_time >= :dateFrom';
            $data['dateFrom'] = $dateFrom;
        }

        if ($dateTo) {
            $query .= ' AND update_time <= :dateTo';
            $data['dateTo'] = $dateTo;
        }

        if ($fuel_search) {
            $query .= ' AND fuel_type = :fuel_search ';
            $data['fuel_search'] = $fuel_search;
        }

        $query .= ' ORDER BY update_time DESC';

        $res = $this->query($query, $data);

        // show($query);
        // die;
        if (is_array($res)) {
            return $res;
        }
        return false;
    }

    /**
     * Get the restocking data for a specific station and fuel type
     * @param int $station_id
     * @param string $fuel_type
     * @return array
     */
    public function getStockData($station_id, $fuel_type)
    {
        if ($fuel_type === '') {
            // SQL query to get all restocking data grouped by month
            $sql = "SELECT MONTHNAME(CONCAT('2023-', derived.month, '-01')) as month, SUM(derived.amount) as total
                    FROM (
                        SELECT MONTH(update_time) as month, SUM(fuel_amount) as amount
                        FROM fuelstock
                        WHERE station_id = :station_id
                        GROUP BY MONTH(update_time)
                    ) as derived
                    GROUP BY derived.month
                    ORDER BY derived.month ASC";
            $queryData = ['station_id' => $station_id];
        } else {
            // SQL query to get restocking data for a specific fuel type grouped by month
            $sql = "SELECT MONTHNAME(CONCAT('2023-', derived.month, '-01')) as month, SUM(derived.amount) as total
                    FROM (
                        SELECT MONTH(update_time) as month, SUM(fuel_amount) as amount
                        FROM fuelstock
                        WHERE station_id = :station_id AND fuel_type = :fuel_type
                        GROUP BY MONTH(update_time)
                    ) as derived
                    GROUP BY derived.month
                    ORDER BY derived.month ASC";
            $queryData = ['station_id' => $station_id, 'fuel_type' => $fuel_type];
        }

        $data['stock-month'] = $this->query($sql, $queryData);

        // Prepare the data for the chart
        $months = [];
        $restocking = [];
        if(!empty($data['stock-month'])){
        foreach ($data['stock-month'] as $row) {
            $months[] = $row['month'];
            $restocking[] = $row['total'];
        }}

        return ['months' => $months, 'restocking' => $restocking];
    }
}
