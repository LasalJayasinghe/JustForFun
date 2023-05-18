<?php

class FuelPrice extends Model {
    protected $table = 'fuel_prices';

    public function updatePrice($fuel_type, $newPrice) {
        $query = "UPDATE " . $this->table . " SET price = :newPrice WHERE fuel_type = :fuel_type";
        $data = [
            ':newPrice' => $newPrice,
            ':fuel_type' => $fuel_type
        ];
    
        $this->query($query, $data);
    }
}
