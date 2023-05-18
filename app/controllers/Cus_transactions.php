<?php
class Cus_transactions extends Controller
{
    public function index()
    {
        $transaction = new Transaction();
        $station = new Stations();
        $operator = new Operator();
        $fuel_prices = new FuelPrice();
    
        // Fetch filter inputs
        $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
        $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;
        $station_search = isset($_GET['station_search']) ? $_GET['station_search'] : null;
    
        $transaction_data = $transaction->gettransactions($start_date, $end_date, $station_search);
    
        $data['transaction_data'] = [];
    
        foreach ($transaction_data as $row) {
            $station_id = $row['station_id'];
            $station_record = $station->first(['station_id' => $station_id]);
    
            if ($station_record) {
                $station_name = $station_record['name'];
            } else {
                $station_name = 'Unknown';
            }
    
            $operator_id = $row['operator'];
            $fuel_type = $row['fuel_type'];
            $fuel_amount = $row['fuel_amount'];
    
            $fuel_price_record = $fuel_prices->first(['fuel_type' => $fuel_type]);
    
            if ($fuel_price_record) {
                $fuel_price = $fuel_price_record['price'];
                $total_price = $fuel_amount * $fuel_price;
            } else {
                $fuel_price = 0;
                $total_price = 0;
            }
    
            $fuel_desc = '';
            if ($fuel_price_record) {
                $fuel_price = $fuel_price_record['price'];
                $fuel_desc = $fuel_price_record['fuel_type_desc'];
                $total_price = $fuel_amount * $fuel_price;
            } else {
                $fuel_price = 0;
                $total_price = 0;
            }
    
            $data['transaction_data'][] = [
                'date' => $row['update_time'],
                'station_name' => $station_name,
                'operator_id' => $operator_id,
                'fuel_amount' => $fuel_amount,
                'fuel_type' => $fuel_type,
                'fuel_desc' => $fuel_desc,
                'total_price' => $total_price,
            ];
        }
    
        $data['fuel_prices'] = $fuel_prices;
        $data['title'] = "Transaction Details";
        $this->view("Customer/transactions", $data);
    }
}    