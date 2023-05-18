<?php

class WeeklyQuota extends Model {
    protected $table = 'weekly_quotas';

    public function updateQuota($vehicle_type, $newQuota) {
        $query = "UPDATE " . $this->table . " SET quota = :newQuota WHERE vehicle_type = :vehicle_type";
        $data = [
            ':newQuota' => $newQuota,
            ':vehicle_type' => $vehicle_type
        ];
    
        $this->queryin($query, $data);
    }

}