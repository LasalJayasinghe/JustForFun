<?php 
class temp extends Controller{
    public function getOrdersForDateRange()
    {

        $data['date1'] = $_POST['date1'];
        $data['date2'] = $_POST['date2'];
        $orders = new orders;
        $ordercount = $orders->getOrderByDateRange($data['date1'], $data['date2']);
        if ($ordercount == false) {
            $ordercount = [];
        }
        $data['ordercount'] = $ordercount;
        $labels = $this->getDateLabels($data['date1'], $data['date2']);
        $data['labels'] = $labels;
        $s = [];
        for ($i = 0; $i < count($labels); $i++) {
            $s[$i] = 0;
            for ($j = 0; $j < count($ordercount); $j++) {
                if ($labels[$i] == $ordercount[$j]->order_date) {
                    $s[$i] = $ordercount[$j]->order_count;
                    break;
                }
            }
        }

        $data['values'] = $s;
        echo json_encode($data);

    }

    public function getDateLabels($date1, $date2)
    {
        $startDate = new DateTime($date1); // start date
        $endDate = new DateTime($date2); // end date
        $labels = [];

        while ($startDate <= $endDate) {
            array_push($labels, $startDate->format('Y-m-d'));
            $startDate->modify('+1 day');
        }

        return $labels;
    }
}



